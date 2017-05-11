<?php

/**
 * Email: 2284876299@qq.com
 * User: XiaoJm
 * Date: 2017/5/7
 * Time: 上午12:01
 * Desc: 类简单描述一下
 */
require_once(ROOT_PATH . '/predis/autoload.php');

/**
 * Class PRedis
 */
class PRedis
{
    /**
     * @var \Predis\Client
     */
    private $redis;

    /**
     * PRedis constructor.
     */
    public function __construct()
    {
        $this->redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => '123456',
            'database' => 0
        ]);
    }

    /**
     * @param $key
     * @param $value
     * @param int $time
     * @return mixed
     */
    public function set($key, $value, $time = 10)
    {
        $key = trim($key);
        if (strlen($key) < 1) return '';

        try {
            return $this->redis->set($key, $value, $time);

        } catch (Exception $exception) {
            return '';
        }

    }

    /**
     * @param $key
     * @return string
     */
    public function get($key)
    {
        $key = trim($key);
        if (strlen($key) < 1) return '';

        try {
            return $this->redis->get($key);
        } catch (Exception $exception) {
            return '';
        }
    }


    /**
     * 对list 进行操作
     * @param $key
     * @param $value
     * @return bool|int|string
     */
    public function lSet($key, $value)
    {
        $key = trim($key);
        if (strlen($key) < 1) return '';

        if (is_string($value)) $value = [$value];

        if ($this->redis->exists($key) && $this->redis->type($key) != 'list') {
            return false;
        }
        return $this->redis->lpush($key, $value);
    }

    /**
     * 设置集合数据
     * @param array $member
     * @return bool
     */
    public function mSet(array $member)
    {
        if (empty($member)) return false;
        if (strtolower($this->redis->mset($member)) == 'ok') {
            return true;
        };
        return false;
    }

}


