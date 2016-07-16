<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/9
 * Time: 上午9:43
 */
date_default_timezone_set('Asia/Shanghai');
define('BASE_PATH',__DIR__);
//require_once(__DIR__ . '/../vendor/redisManager/autoload.php');
//引入base
require_once(__DIR__ . '/config/define.php');
//$redisConf = require_once(__DIR__ . '/config/redis.php');
$dbConf = require_once(__DIR__ . '/config/db.php');
//引入params
//require_once(__DIR__ . '/params.php');
//$dbConf = $params['db']['db_app'];//定义读取的数据库名
//$redisConf = $params['redis']['movie_comment'];//定义刷入的redis的参数
//u url  路径文件夹
// c 文件名称也是类名
// f  function 名称
// n 进程数
// w  where条件

$input = getopt('u:c:f:n:w:');
if(empty($input['u'])){
    throw new \Exception("must input -u !!! \n");
}
if(empty($input['c'])){
    throw new \Exception("must input -c !!! \n");
}

if(empty($input['f']) && empty($input['n'])){
    throw new \Exception("must input -f 1 or -n 1 !!! \n");
}
require_once(__DIR__ . "/{$input['u']}".'/base.php');
$c = $input['c'];
require_once(__DIR__."/{$input['u']}/{$c}.php");

$w = !empty($input['w'])?$input['w']:'';
$n = !empty($input['n'])?$input['n']:1;
$cronObj = new $c();
$cronObj->$input['f']($n,$w);
