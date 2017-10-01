<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/18
 * Time: 11:15
 *
 * 80. Remove Duplicates from Sorted Array II
 *
 * Follow up for "Remove Duplicates":
 * What if duplicates are allowed at most twice?
 * For example,
 * Given sorted array nums = [1,1,1,2,2,3],
 * Your function should return length = 5, with the first five elements of nums being 1, 1, 2, 2 and 3.
 * It doesn't matter what you leave beyond the new length.
 *
 *  删除重复 的后续：如果重复是允许最多两次的情况下的结果集
 * 例如
 * 排序后的数组[1,1,1,2,2,3 ]
 * 执行完函数后的数组未[1,1,2,2,3]
 * 返回长度结果为5
 */
$array = [1, 1, 1, 2, 2, 3];
$array = [1, 1,1, 2, 2,2, 3, 4,4,4, 5, 5, 6, 6, 7, 7, 7, 7, 8];

function removeDuplicates($array)
{
    //数组长度最小大于2
    $k = 1;
    for ($i = 2; $i < count($array); $i++) {
        if ($array[$k - 1] == $array[$k] && $array[$i] == $array[$k]) {
            continue;
        } else {
            $array[++$k] = $array[$i];
        }
    }
    for ($i = count($array); $i > $k; $i--) {
        unset($array[$i]);
    }
    print_r($array);
    return count($array);
}

print_r(removeDuplicates($array));