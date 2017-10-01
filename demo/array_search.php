<?php
/**
 * 查找算法
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/5
 * Time: 11:07
 */
$array = array(2, 4, 5, 6, 7, 8, 9, 10);//需要查找的数组
$value = 9;//需要查找的值
//二分查找 while 方式
function search_binary_while($array,$value)
{
    $low = 0;
    $max = count($array)-1;
    while ($low <=$max){
        $mid = intval(($low + $max) /2);
        if ($array[$mid] == $value){
            return $mid;
        }elseif($array[$mid] > $value){
            $max = $mid -1;
        }else{
            $low = $mid +1;
        }
    }
    return $mid;
}
//print_r(search_binary_while($array,4));
//二分查找，递归
function search_binary_recursion($array,$low,$max,$value)
{
    if ($low >= $max || $array[$low] > $value || $array[$max] < $value)
        return false;
    $mid = intval(($low+$max)/2);
    if($array[$mid] == $value){
        return $mid;
    }elseif ($array[$mid] > $value){
        return search_binary_recursion($array,$low,$mid-1,$value);
    }else{
        return search_binary_recursion($array,$mid+1,$max,$value);
    }
    return $mid;
}
//print_r(search_binary_recursion($array,0,count($array)-1,9));
//顺序查找
function search_gener($array,$value)
{
    foreach ($array as $key=>$val){
        if ($value == $val){
            return $key;
        }
    }
    return false;
}
print_r(search_gener($array,$value));