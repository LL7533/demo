<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/10
 * Time: 22:37
 */

//n的阶乘有几个0
function jiecheng0($n)
{
    $num0 = 0;

    while($n)
    {
        $num0 += intval($n / 5);
        $n = intval($n / 5);
    }
    return $num0;
}
//echo  jiecheng0(6);
//n的阶乘是多少,递归法
function jiecheng_1($n)
{
    if ($n <=1){
        return 1;
    }
    return $n * jiecheng_1($n-1);
}
//echo  jiecheng_1(5).PHP_EOL;
//n的阶乘是多少,循环
function jiecheng_2($n)
{
    if ($n <=1){
        return 1;
    }
    $num = 1;
    for ($i=1;$i<=$n;$i++){
        $num *= $i;
    }
    return $num;
}
//echo  jiecheng_2(5).PHP_EOL;
