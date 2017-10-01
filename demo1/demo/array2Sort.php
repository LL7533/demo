<?php
/**
 * 二维数组排序
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/28
 * Time: 19:26
 */

$array = [
    ['id'=>1,'age'=>34,'score'=>99],
    ['id'=>1,'age'=>2,'score'=>88],
    ['id'=>99,'age'=>12,'score'=>32],
    ['id'=>3,'age'=>34,'score'=>99],
    ['id'=>99,'age'=>12,'score'=>98],
    ['id'=>66,'age'=>34,'score'=>77],
    ['id'=>66,'age'=>34,'score'=>55],
    ['id'=>3,'age'=>19,'score'=>1],
];
/*
 * 二维数组，根据多个字段排序，入参格式：$sort = [['fild'=>'age','direction'=>'SORT_DESC']];
 * 实现 mysql order 排序
 */
function array_2_sort()
{
    $arrData = func_get_args();
    if(empty($arrData)){
        return null;
    }
    $arr = array_shift($arrData);
    if(!is_array($arr)){
        throw new Exception("第一个参数不为数组");
    }
    foreach($arrData as $key => $field){
        if(is_string($field)){
            $temp = array();
            foreach($arr as $index=> $val){
                $temp[$index] = $val[$field];
            }
            $arrData[$key] = $temp;
        }
    }
    $arrData[] = &$arr;//引用值
    call_user_func_array('array_multisort',$arrData);
    return array_pop($arrData);
}
print_r(array_2_sort($array,'id',SORT_ASC,'age',SORT_ASC,'score',SORT_ASC));exit;
