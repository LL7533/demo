<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/22
 * Time: 18:41
 */
//有一列数的规则如下 1、1、2、3、5、8、13、21、34... 求第30位数是多少。写出相关函数和算法名称

function tnum($num)
{
    if ($num <= 2 && $num >0){
        return 1;
    }elseif ($num <= 0){
        return 0;
    }else{
        return tnum($num-1)+tnum($num -2);
    }
}
$t = tnum(5);
echo  $t.PHP_EOL;