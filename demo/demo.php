<?php

/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/22
 * Time: 18:07
 * // */
$a = "\16";
echo $a.PHP_EOL;
var_dump(intval($a));
//if(strpos("锤子科技","锤子")){
//    echo "a";
//}elseif(intval(substr("2020年",-2)))
//{
//    echo "b";
//}
//var_dump(intval('a1'));
//n的阶乘有几个0
//function jiecheng0($n)
//{
//    $num0 = 0;
//
//    while($n)
//    {
//        $num0 += intval($n / 5);
//        $n = intval($n / 5);
//    }
//    return $num0;
//}
//echo  jiecheng0(6);

//class A
//{
//    function example()
//    {
//        echo "I am A::example()\n";
//    }
//}
//
//class B extends A
//{
//    function example()
//    {
//        echo "I am B::example() \n";
//	    parent::example();
//    }
//}
//$b = new B;
//$b->example();

//$array = [99,1,43,54,62,21,66,32,78,36,76,39,2,2];
//$arr = array(2, 4, 5, 6, 7, 8, 9, 10);
//$low = 0;   //要查找范围的最小键值
//$search = 4;
////计算出数组的长度
////$high = count($arr) - 1;
//while ($low <= $high) {
//    //取得数组的中间键值
//    $mid = intval(($low + $high) / 2);
//    if ($arr[$mid] == $search) {
//        //如果取出中间的下标值跟你要搜索的值相等的话，直接去除值得下标就行
//        echo "你要查找的值在数组内的下标为" . $mid;
//        break;
//    } elseif ($arr[$mid] > $search) {
//        $high = $mid - 1;
//    } else {
//        $low = $mid + 1;
//    }
//}
////print_r($arr);exit;
//
//function search_binary($array,$low,$top,$value)
//{
//    if ($low <= $top){
//        $mid = intval(($low + $top)/2);
//        if ($array[$mid] == $value){
//            return $mid;
//        }elseif ($array[$mid] < $value){
//            return search_binary($array,$mid+1,$top,$value);
//        }else{
//            return search_binary($array,$low,$mid-1,$value);
//        }
//    }
//}
//print_r(search_binary($arr,0,count($arr)-1,9));
//exit;
//
//function insert_sort($array)
//{
//    if(!is_array($array) || empty($array) || count($array) <=1)
//        return $array;
//    $len = count($array);
//    for ($i=1;$i<$len;$i++){
//        $tem = $array[$i];
//        for ($j=$i-1;$j>=0;$j--){
//            if ($tem < $array[$j]){
//                $array[$j+1] = $array[$j];
//                $array[$j] = $tem;
//            }
//        }
//    }
//    return $array;
//}
//print_r(insert_sort($array));exit;
////插入排序
//function insert_sort($array)
//{
//    if(!is_array($array) || empty($array) || count($array) <=1)
//        return $array;
//    $len = count($array);
//    for ($i=1;$i<$len;$i++){
//        $tem = $array[$i];
//        for ($j=$i-1;$j>=0;$j--){
//            if ($tem < $array[$j]){
//                $array[$j+1] = $array[$j];
//                $array[$j] = $tem;
//            }else{
//                break;
//            }
//        }
//    }
//    return $array;
//}
//function insertSort($arr) {
//    $len=count($arr);
//    for($i=1; $i<$len;$i++) {
//        $tmp = $arr[$i];
//        //内层循环控制，比较并插入
//        for($j=$i-1;$j>=0;$j--) {
//            if($tmp < $arr[$j]) {
//                //发现插入的元素要小，交换位置，将后边的元素与前面的元素互换
//                $arr[$j+1] = $arr[$j];
//                $arr[$j] = $tmp;
//            } else {
//                //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
//                break;
//            }
//        }
//    }
//    return $arr;
//}
//print_r(insert_sort($array));exit;
////选择排序
//function select_sort($array)
//{
//    if (!is_array($array) || empty($array) || count($array) <= 1)
//        return $array;
//    $len = count($array);
//    for ($i = 0; $i < $len - 1; $i++) {
//        $p = $i;
//        for ($j = $i + 1; $j < $len; $j++) {
//            if ($array[$p] > $array[$j]) {
//                $p = $j;
//            }
//        }
//        if ($p != $i) {
//            $tem = $array[$i];
//            $array[$i] = $array[$p];
//            $array[$p] = $tem;
//        }
//    }
//    return $array;
//}
//print_r(select_sort($array));exit;
//////快速排序
//function quick_sort($array)
//{
//    if(!is_array($array) || empty($array) || count($array) <1)
//        return$array;
//    $key = $array[0];
//    $leftArray = [];
//    $rightArray = [];
//    $keyArray = [];
//    foreach ($array as $value){
//        if ($value <$key)
//            $leftArray[] = $value;
//        elseif ($value > $key)
//            $rightArray[] = $value;
//        else
//            $keyArray[] = $value;
//    }
//    $leftArray = quick_sort($leftArray);
//    $rightArray = quick_sort($rightArray);
//    return array_merge($leftArray,$keyArray,$rightArray);
//}
//print_r(quick_sort($array));exit;
////冒泡排序
//function bubble_sort($array)
//{
//    if(!is_array($array) || empty($array) || count($array) <=1)
//        return$array;
//    $cNum = count($array);
//    for ($i=0;$i<$cNum;$i++){
//        for ($j=$i;$j<$cNum;$j++){
//            if($array[$i] > $array[$j]){
//                $t = $array[$j];
//                $array[$j] = $array[$i];
//                $array[$i] = $t;
//            }
//        }
//    }
//    return $array;
//}
//print_r(bubble_sort($array));exit;

//function &mgfun()
//{
//    static $b = 10;
//    echo  '$b='.$b.PHP_EOL;
//    return $b;
//}
//$a = mgfun();
//echo  $a . PHP_EOL;
////$a = &mgfun();
//echo  $a . PHP_EOL;
//$a = 100;
//echo  $a . PHP_EOL;
//echo  mgfun();
//exit;
//$str = 'hello你好世界';
//echo strlen($str);

//遍历文件夹
//function my_scandir($dir)
//{
//    $files=array();
//    if(is_dir($dir))
//    {
//        if($handle=opendir($dir))
//        {
//            while(($file=readdir($handle))!==false)
//            {
//                if($file!="."&& $file!="..")
//                {
//                    if(is_dir($dir."/".$file))
//                    {
//                        $files[$file]=my_scandir($dir."/".$file);
//                    }
//                    else
//                    {
//                        $files[]=$dir."/".$file;
//                    }
//                }
//            }
//            closedir($handle);
//            return $files;
//        }
//    }
//}
//echo "\n";
//print_r(my_scandir("/data"));

//function getDays($date){
//    $days=date("t",strtotime($date));
//    return $days;
//}
//
////2015 年12 月
//$date="2015-02";
//echo getDays($date);
/*
 请将2维数组按照name的长度进行重新排序，按照顺序将id赋值(从1开始))
*/
//$array = array(
//    array('id' => 0, 'name' => '123'),
//    array('id' => 0, 'name' => '12345'),
//    array('id' => 0, 'name' => '1234'),
//    array('id' => 0, 'name' => '123abcd'),
//    array('id' => 0, 'name' => '123456'),
//);
//$arrLen = [];
//foreach ($array as &$value){
//    $arrLen[] = $value['id'] = strlen($value['name']);
//}
//array_multisort($arrLen,SORT_ASC,$array);
//foreach ($array as $key=>&$val){
//    $val['id'] = $key+1;
//}
//print_r($array);

//$date = date_diff(date_create('2007-3-6'), date_create('2007-2-5'));
//print_r($date);
//$data = array(‘a’, ‘b’, ‘c’);
//foreach($data as $key=>$val) {
//    var_dump($data);
//    $val = &$data[$key];
//}
//var_dump($data);
//$a=0;
//$b=0;
//if( $a=3 || $b=3 ){
//    $a++; //true++
//    $b++; //0++
//}
//echo$a.",".$b; //1,1
//$a=0;
//$b=0;
//if($a=(3|$b=3)){
//    $a++;//3++
//    $b++;//3++
//}
//echo$a.",".$b;//4,4

//$test='aaaaaa';
//$abc=&$test;
//unset($test);
//echo $abc;

//function myfunc($argument){
//    echo $argument + 10;
//}
//$variable = 10;
//echo "myfunc($variable)=".myfunc($variable);

//
//$num = 10;
//function multiply($num){
//    $num = $num * 10;
//}
//multiply($num);
//echo $num;
//exit;
//
//class A {
//    private static $obj = null;
//    private function __construct() {
//    }
//    private function __clone() {
//    }
//    static public function getObj() {
//        if (is_null ( self::$obj ) || isset ( self::$obj )) {
//            self::$obj = new self ();
//        }
//        return self::$obj;
//    }
//    public function getName() {
//        echo 'hello world!';
//    }
//}
//
////
////
////
////public function fixdata()
////{
////    $redis = $this->redis();
////    $fixRedisId = 'adexchange.lastfixredisid';
////    $startRedisId = $redis->get($fixRedisId);
////    if (empty($startRedisId)) {
////        $startRedisId = 20600000;
////    }
////    if (!empty($_GET['startRedisId'])) {
////        $startRedisId = $_GET['startRedisId'];
////    }
////    $redis_key_bid = 'adexchange.bid';
////    $objdb = M('ad_log');
////    $time = time();
////
////    $v = $startRedisId;
////    $i = 0;
////    while (1) {
////        if (time() - $time > 30) {
////            break;
////        }
////        $v++;
////        $redis->set($fixRedisId, $v);
////        $a = $redis->hGet($redis_key_bid, $v);
////        $redis->hDel($redis_key_bid, $v);
////        $data = json_decode($a, true);
////        if (empty($data)) {
////            continue;
////        }
////        $objdb->add($data);
////        $i++;
////    }
////    echo '共修复数据：' . $i;
////}
////

?>