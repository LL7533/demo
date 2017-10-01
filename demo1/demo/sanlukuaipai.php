<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/12
 * Time: 18:06
 */
$array = [0,2,1,2,2,1,0,0,0,0,1,2,1,1,2,2,0,2,1,2,1,0];

function sort_color($array)
{
    $z=-1;
    $t = count($array);
    for ($i=0;$i<$t;){
        if($array[$i] == 1){
            $i++;
        }elseif ($array[$i] == 2){
            $tem = $array[$t-1];
            $array[$t-1] =  $array[$i];
            $array[$i] = $tem;
            $t --;
        }elseif ($array[$i] == 0){
            $tem = $array[$i];
            $array[$i] = $array[$z +1];
            $array[$z+1] = $tem;
            $z ++;
            $i++;
        }else{
            echo  'error'.PHP_EOL;exit;
        }
    }
    return $array;
}
print_r(sort_color($array));