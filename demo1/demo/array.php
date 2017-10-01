<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/23
 * Time: 16:59
 */

//echo  '数组取出最大的k元素["A","Cat","D","A","D","M","M","D","A","A","D","D","D","A","A",]'.PHP_EOL;
//$arr = ["A","Cat","D","A","D","M","M","D","A","A","D","D","D","A","A",];
//$arr = array_count_values($arr);
//print_r(array_keys($arr,max($arr)));
//echo  PHP_EOL;

/*
 请将2维数组按照name的长度进行重新排序，按照顺序将id赋值(从1开始))
*/
$array = array(
    array('id' => 0, 'name' => '123'),
    array('id' => 0, 'name' => '12345'),
    array('id' => 0, 'name' => '1234'),
    array('id' => 0, 'name' => '123abcd'),
    array('id' => 0, 'name' => '123456'),
);
//$arrLen = [];
foreach ($array as &$value){
    $arrLen[] = $value['id'] = strlen($value['name']);
}
//array_multisort($arrLen,SORT_ASC,$array);
//foreach ($array as $key=>&$val){
//    $val['id'] = $key+1;
//}
//print_r($array);

/*
 * 二维数组排序
 */
print_r(orderArray($array,'id',1));
function orderArray($arrData,$key,$order)
{
    $arrOrder = [];
    foreach ($arrData as $val){
        $arrOrder[] = $val[$key];
    }
    $order == 1? array_multisort($arrOrder,SORT_ASC,$arrData):array_multisort($arrOrder,SORT_DESC,$arrData);
    return $arrData;
}