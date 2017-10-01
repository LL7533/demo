<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/22
 * Time: 16:30
 */

echo  '$a = "hello";   $b = &$a;   unset($b);  $b = "world";  变量a的值为'.PHP_EOL;
$a = "hello";
$b = &$a;
unset($b);
$b = "world";
echo  '$a='.$a.PHP_EOL;