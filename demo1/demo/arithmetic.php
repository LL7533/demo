<?php
/**
 * 算法相关
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/4
 * Time: 16:10
 */
//发打印菱形 +1
function rhombus($len)
{
    if ($len % 2 == 0)
        $len += 1;
    $len = ceil($len/2);
    for ($i=0;$i<=$len;$i++)
    {
        echo str_repeat(' ',$len-$i);
        echo  str_repeat('*',$i*2 -1);
        echo  PHP_EOL;
    }
    for ($j=$len-1;$j>=1;$j--){
        echo str_repeat(' ',$len-$j);
        echo str_repeat('*',$j*2 -1);
        echo  PHP_EOL;
    }
}
//rhombus(7);
//打印杨辉三角
function yanghui($len)
{
    for ($i=0;$i<$len;$i++){
        $array[$i][0] = 1;
        $array[$i][$i] = 1;
    }
    for ($i=2;$i<$len;$i++){
        for ($j=1;$j<$i;$j++){
            $array[$i][$j] = $array[$i-1][$j-1] + $array[$i-1][$j];
        }
    }
    //输出
    for ($i=0;$i<$len;$i++){
        for ($j=0;$j<=$i;$j++){
            echo $array[$i][$j].' ';
        }
        echo PHP_EOL;
    }
}
//yanghui(5);
//打印杨辉三角m行n列的数据
function yanghuiMN($m,$n)
{
    if ($m == $n || $n == 1)
        return 1;
    if ($m > $n && $n !=1 && $m >3){
        return yanghuiMN($m-1,$n-1) + yanghuiMN($m-1,$n);
    }
//    if($m < $n){
//        return false;
//    }
//    if ($n == 1 || $m <3 )
//        return 1;
}
echo  yanghuiMN(7,4).PHP_EOL;exit;
/*
 * 牛年求牛：有一母牛，到4岁可生育，每年一头，所生均是一样的母牛，到15岁绝育，不再能生，20岁死亡，问year年后有多少头牛
 */
function cattle($year)
{
    static $num =1;
    for ($i=1;$i<=$year;$i++){
        if($i>=4 && $i<15){
            $num ++;
            cattle($year - $i);
        }elseif ($i == 20){
            $num --;
        }
    }
    return $num;
}
//echo  cattle(21).PHP_EOL;
