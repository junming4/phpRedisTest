<?php
/**
 * Email: 2284876299@qq.com
 * User: XiaoJm
 * Date: 2017/5/7
 * Time: 下午9:53
 * Desc: 类简单描述一下
 */

require_once (__DIR__.'/predis/autoload.php');

$single_server = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'password' => '123456',
    'database' => 0,
);

$options = array(
    'connections' => array(
        'tcp' => 'SimpleDebuggableConnection',
    ),
);

$client = new Predis\Client($single_server);

$client->set('foo', 'bar');
var_dump($client->get('foo'));
//$client->info();