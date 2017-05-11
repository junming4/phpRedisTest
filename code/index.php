<?php
/**
 * Email: 2284876299@qq.com
 * User: XiaoJm
 * Date: 2017/5/6
 * Time: 下午11:15
 * Desc: redis 简单便捷
 *
 */


define('ROOT_PATH', dirname(__DIR__));



require_once ('PRedis.php');

global $pRedis;

$pRedis = new Predis();
//echo $pRedis->get('ssname');


//echo $pRedis->lSet('sName', 'uuu');
echo $pRedis->mSet(['user:1'=>'xiao','user:2'=>'junMing']);

