<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/13
 * Time: 16:33
 * 11.Container With Most Water
 * 给出一个非负整数数组，a1,a2,a3,……，an；每个整数表示一个竖立在坐标轴x位置的一堵高度为ai的“墙”，
 * 选择两堵墙，和x轴构成的容器可以容纳最多的水
 */
$array = [4,10,4,7,8,9,9];
function huadong($array)
{
    $left = 0; //左边界
    $right = count($array)-1; //右边界
    $sum = min($array[$left],$array[$right]) * ($right-$left); //起始面积之和
    $mian[0] = [$left=>$array[$left],$right=>$array[$right]];//记录数据
    while ($left <= $right  && $right <= count($array) -1){
        $s = min($array[$left],$array[$right]) * ($right-$left);
        if ($sum < $s){
            $sum = $s;
            $mian[0] = [$left=>$array[$left],$right=>$array[$right]];//记录数据
        }
        if ($array[$left] >$array[$right]){
            $right --;
        }else{
            $left ++;
        }
    }
    return $mian;
}
print_r(huadong($array)).PHP_EOL;