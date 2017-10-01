<?php
/**
 * 一维数组排序
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/28
 * Time: 19:26
 */
$array = [1,43,54,62,21,66,32,78,36,76,39,2,2];
//冒泡排序
function bubble_sort($array){
    $count = count($array);
    if ($count <= 0) return false;
    for($i=0; $i<$count; $i++){
        for($j=$i; $j<$count; $j++){
            if ($array[$i] > $array[$j]){
                $tmp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}
//print_r(bubble_sort($array));
//快速排序（数组排序）
function quick_sort($array) {
    if (count($array) <= 1) return $array;
    $key = $array[0];
    $left_arr = array();
    $right_arr = array();
    for ($i=1; $i<count($array); $i++){
        if ($array[$i] <= $key)
            $left_arr[] = $array[$i];
        else
            $right_arr[] = $array[$i];
    }
    $left_arr = quick_sort($left_arr);
    $right_arr = quick_sort($right_arr);
    return array_merge($left_arr, array($key), $right_arr);
}
//print_r(quick_sort($array));exit;
//选择排序
function select_sort($array)
{
    if(!is_array($array) || empty($array) || count($array) <=1)
        return $array;
    $len = count($array);
    for ($i=0;$i<$len -1;$i++){
        $p = $i;
        for ($j=$i+1;$j<$len;$j++){
            if($array[$p] > $array[$j]){
                $p = $j;
            }
        }
        if ($p != $i){
            $tem = $array[$i];
            $array[$i] = $array[$p];
            $array[$p] = $tem;
        }
    }
    return $array;
}
//print_r(select_sort($array));exit;
//插入排序
function insert_sort($array)
{
    if(!is_array($array) || empty($array) || count($array) <=1)
        return $array;
    $len = count($array);
    for ($i=1;$i<$len;$i++){
        $tem = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($tem < $array[$j]){
                $array[$j+1] = $array[$j];
                $array[$j] = $tem;
            }else{
                break;
            }
        }
    }
    return $array;
}
//for($i=0;$i<=3;$i++){
//    echo str_repeat(" ",3-$i);
//    echo str_repeat("*",$i*2+1);
//    echo PHP_EOL;
//}
//print_r(insert_sort($array));exit;
////二分查找（数组里查找某个元素）
//function bin_sch($array, $low, $high, $k){
//    if ($low <= $high){
//        $mid = intval(($low+$high)/2);
//        if ($array[$mid] == $k){
//            return $mid;
//        }elseif ($k < $array[$mid]){
//            return bin_sch($array, $low, $mid-1, $k);
//        }else{
//            return bin_sch($array, $mid+1, $high, $k);
//        }
//    }
//    return -1;
//}
////顺序查找（数组里查找某个元素）
//function seq_sch($array, $n, $k){
//    $array[$n] = $k;
//    for($i=0; $i<$n; $i++){
//        if($array[$i]==$k){
//            break;
//        }
//    }
//    if ($i<$n){
//        return $i;
//    }else{
//        return -1;
//    }
//}

