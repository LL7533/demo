<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/13
 * Time: 10:52
 *
 * 给定一个整形数组和一个数字s，找到数组中最短的一个连续子数组，使得连续子数组的数组和sum>=s,返回这个最短的连续子数组的返回值
 * 如，给定数组[2,3,1,2,4,3]   s=7
 * 答案为[4,3],返回2
 */
$array = [2,3,1,2,4,3];
$s = 7;

function huadong($array,$s)
{
    $left = 0; //左边界
    $right = -1; //右边界
    $sum = 0; //和
    $res = count($array)+1;//个数
    while ($left < count($array) -1){
        if ($right+1 <count($array) && $sum < $s){
            $sum += $array[++$right];
        }else{
            $sum -= $array[$left++];
        }
        if ($sum >= $s){
            $res = min($res,$right - $left +1);
        }
    }
    if ($res == count($array)+1){
        $res = 0;
    }
    return $res;
}
echo huadong($array,$s).PHP_EOL;