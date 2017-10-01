<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/8
 * Time: 23:32
 */
//根据三边来确认三角形

function triangle($a,$b,$c)
{
    if($a <= 0 || $b <= 0 || $c <= 0){
        return '不是三角形'.PHP_EOL;
    }
    $array[] = $a;
    $array[] = $b;
    $array[] = $c;
    arsort($array);
    $array = array_values($array);
    if ($array[0] >= ($array[1] + $array[2]) || ($array[0] - $array[2]) >=$array[1]){
        return '不是三角形1'.PHP_EOL;
    }
    if ($array[0] == $array[1] && $array[1] == $array[2] && $array[0] == $array[2]){
        return '等边三角形'.PHP_EOL;
    }elseif($array[0] == $array[1] || $array[1] == $array[2]){
        if($array[0] * $array[0] == ($array[1] * $array[1] + $array[2] *$array[2])){
            return  '等腰直角三角形'.PHP_EOL;
        }else return  '等腰三角形'.PHP_EOL;
    }elseif ($array[0] * $array[0] == ($array[1] * $array[1] + $array[2] *$array[2])){
        return  '直角三角形'.PHP_EOL;
    }else{
        return '普通三角形'.PHP_EOL;
    }
}
echo triangle(3,6,9);