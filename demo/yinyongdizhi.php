<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/22
 * Time: 16:47
 */

echo '$str="cd";      $$str="hotdog";      $$str.="ok";   echo $cd;'.PHP_EOL;
$str="cd";
$$str="hotdog";
$$str.="ok";
echo  '答案：$cd='.$cd.PHP_EOL;