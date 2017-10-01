<?php

/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/17
 * Time: 下午10:50
 */

date_default_timezone_set('Asia/Shanghai');
define('BASE_PATH',__DIR__);
require_once ('book/base.php');
/*
 * c 文件类名
 * f 方法名
 * n 进程数
 * s 开始值
 * e 结束值
 */
$input = getopt('c:f:s:e:n:');

if(empty($input['c'])){
    throw new \Exception("must input -c !!! \n");
}

if(empty($input['f']) && empty($input['n'])){
    throw new \Exception("must input -f 1 or -n 1 !!! \n");
}

$c = $input['c'];
$f = $input['f'];
$n = empty($input['n'])?1:$input['n'];
$s = empty($input['s'])?1:$input['s'];
$e = empty($input['e'])?9999:$input['e'];
require_once(__DIR__."/book/{$c}.php");
$objc = new $c;
$objc->$f($s,$e,$n);