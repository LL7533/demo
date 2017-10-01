<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/16
 * Time: 21:44
 * 283 Move Zeros
 * Given an array nums, write a function to move all 0's to the end of it while maintaining the relative order of the non-zero elements.
 * For example, given nums = [0, 1, 0, 3, 12], after calling your function, nums should be [1, 3, 12, 0, 0].
 *
 * 给定一个数字的数组，写一个函数将所有为0的放在结束，并且保持非零元素的相对顺序。
 * 例如，给定数组= [ 0, 1, 0，3, 12 ]，执行你的函数后，应该是[ 1, 3, 12，0, 0 ]。
 *
 * Note:
 * You must do this in-place without making a copy of the array.
 * Minimize the total number of operations.
 * 注意：不能复制数组，最简化操作
 */

$array = [0, 1, 0, 3, 12];

/**
 * 新数组法,剩下的补齐，其实也可以合并数组，只是空间复杂度会增大
 * @param $array
 * @return mixed
 */
function moveZeroes_1($array)
{
    $left = [];
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] !== 0) {
            $left[] = $array[$i];
        }
    }
    for ($i = count($left); $i < count($array); $i++) {
        $left[$i] = 0;
    }
    return $left;
}

//print_r(moveZeroes_1($array));
/**
 * 前移法--记录不是0的，前移，剩下的补齐0；
 * @param $array
 * @return mixed
 */
function moveZeroes_2($array)
{
    $noZero = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] !== 0) {
            $array[$noZero++] = $array[$i];
        }
    }
    for ($i = $noZero; $i < count($array); $i++) {
        $array[$i] = 0;
    }
    return $array;
}

//print_r(moveZeroes_2($array));

/**
 * 替换法
 * @param $array
 */
function moveZeroes_3($array)
{
    $noZero = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] !== 0) {
            if ($noZero != $i){
                $tem = $array[$i];
                $array[$i] = $array[$noZero];
                $array[$noZero] = $tem;
            }
            $noZero++;
        }
    }
    return $array;
}
print_r(moveZeroes_3($array));