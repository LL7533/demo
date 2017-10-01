<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/18
 * Time: 10:48
 * 26 Remove Duplicates from Sorted Array
 * Given a sorted array, remove the duplicates in place such that each element appear only once and return the new length.
 * Do not allocate extra space for another array, you must do this in place with constant memory.
 * For example,
 * Given input array nums = [1,1,2],
 * Your function should return length = 2, with the first two elements of nums being 1 and 2 respectively.
 * It doesn't matter what you leave beyond the new length.
 *
 * 给定一个有序数组，删除重复的元素，使每个元素只出现一次，并返回新的长度。
 * 不要开辟新的数组储存数据，您必须在内存中执行此操作。
 * 例如,
 * 给定的输入数组数组= [1,1,2]
 * 你的函数应该返回长度为2的数组，分别为1和2的第一个元素。新数组长度冰不重要。
 */
$array = [1, 1, 2, 2, 3, 4, 5, 5, 6, 6, 7, 7, 7, 7, 8];

function removeDuplicates($array)
{
    $k = 1;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] != $array[$k-1]) {
            $array[$k++] = $array[$i];
        }
    }
    for ($i = count($array) - 1; $i >= $k; $i--) {
        unset($array[$i]);
    }
    print_r($array);
    return count($array);
}

print_r(removeDuplicates($array));