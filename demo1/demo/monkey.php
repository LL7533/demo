<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/22
 * Time: 16:34
 */
//一群猴子排成一圈，按1，2，...，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去...，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号
echo  '一群猴子排成一圈，按1，2，...，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去...，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号'.PHP_EOL;

function monkey($n,$m)
{
    //定义全量数组
    $arrData = [];
    for ($i=1;$i<=$n;$i++){
        $arrData[] = $i;
    }
    $t =0;//起始值
    //循环数组,判断猴子次数
    while (count($arrData) >1){
        if(($t+1) % $m == 0){
            unset($arrData[$t]);//把第m只猴子踢出去
        }else{
            array_push($arrData,$arrData[$t]);//把第m只猴子放在最后
            unset($arrData[$t]);
        }
        $t++;
    }
print_r($arrData);

}

monkey(10,2);
$t = yuesefu(10,2);
echo  '2222222'.$t;

function yuesefu($n,$m)
{
    $r=0;
    for($i=2; $i<=$n; $i++)
    {
        $r=($r+$m)%$i;
    }
    return $r+1;
}
