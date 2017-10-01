<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/12
 * Time: 18:20
 */
$array = [0,0,1,2,3,3,4,5,5,6,7,8,9];//有序数组
$value = 8;
/**
 * 暴力解法
 * @param $array
 * @param $value
 */
function baoli_sum($array,$value)
{
    $resArray = [];
    for ($i=0;$i<count($array);$i++){
        if($array[$i] >= $value){
            break;
        }
        for($j = $i+1;$j< count($array);$j++){
            if($array[$i] + $array[$j] == $value){
                $resArray[] = [$i=>$array[$i],$j=>$array[$j]];
                echo $array[$i] .'+'. $array[$j].PHP_EOL;
            }elseif ($array[$i] + $array[$j] > $value){
                break;
            }
        }
    }
    return $resArray;
}
//print_r(baoli_sum($array,$value));

//对撞法---对撞指针
function solution_sum($array,$value)
{
    $resArray = [];
    $min = 0;
    $max = count($array)-1;
    while ($min < $max){
        if($array[$min] + $array[$max] == $value){
            $resArray[] = [$min=>$array[$min],$max=>$array[$max]];
//            if($array[$min] == $array[$min +1] && $array[$max] == $array[$max -1] && $min +1 < $max -1 ){
////                $resArray[] = [$min=>$array[$min],$max-1=>$array[$max]];
////                $resArray[] = [$min+1=>$array[$min],$max=>$array[$max]];
////                $resArray[] = [$min+1=>$array[$min],$max-1=>$array[$max]];
//                $max -=2;
//                $min +=2;
//            }else
            if ($array[$min] == $array[$min +1]){
                $min +=2;
            }elseif ($array[$max] == $array[$max -1]){
                $max -=2;
            }else{
                $min ++;
            }
        }elseif($array[$min] + $array[$max] < $value){
            $min ++;
        }else $max --;
    }
    return $resArray;
}
print_r(solution_sum($array,$value));