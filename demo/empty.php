<?php
/**
 * 各空值、空对象的判断
 */
echo 'objA = new Test()' . " 空对象:无内容的对象输出判断\n";

class Test
{
}

$objA = new Test();
if ($objA)
    echo "objA is yes \n";
else echo "objA if is no\n";

echo $objA ? "objA? is yes \n" : "objA? is no \n";
echo isset($objA) ? "isset(objA) is yes \n" : "isset(objA) is no \n";
echo is_null($objA) ? "is_null(objA) is yes \n" : "is_null(objA) is no \n";
echo empty($objA) ? "empty(objA) is yes \n" : "empty(objA) is no \n";
/*
if is yes 
? is yes 
isset is yes 
is_null is no 
empty is no 
 */
echo PHP_EOL . '$arr = []' . "  空数组[]:无内容的数组输出判断\n";
$arr = [];
if ($arr)
    echo "if(arr) is yes \n";
else echo "if(arr) is no\n";

echo $arr ? "arr ? is yes \n" : "arr ? is no \n";
echo isset($arr) ? "isset(arr) is yes \n" : "isset(arr) is no \n";
echo is_null($arr) ? "is_null(arr) is yes \n" : "is_null(arr) is no \n";
echo empty($arr) ? "empty(arr) is yes \n" : "empty(arr) is no \n";
/*
if is no
? is no 
isset is yes 
is_null is no 
empty is yes 
 */
echo PHP_EOL . '$str = \'\'' . "   :无内容的俩单引号输出判断\n";
$str = '';
if ($str)
    echo "if(str) is yes \n";
else echo "if(str) is no\n";
echo $str ? "str ? is yes \n" : "str ? is no \n";
echo isset($str) ? "isset(str) is yes \n" : "isset(str) is no \n";
echo is_null($str) ? "is_null(str) is yes \n" : "is_null(str) is no \n";
echo empty($str) ? "empty(str) is yes \n" : "empty(str) is no \n";
/*
if is no
? is no 
isset is yes 
is_null is no 
empty is yes 
 */
echo PHP_EOL . '$int=0   ' . "输出判断\n";
$int = 0;
if ($int)
    echo "if(int) is yes \n";
else echo "if(int) is no\n";
echo $int ? " int ? is yes \n" : " int ? is no \n";
echo isset($int) ? "isset(int) is yes \n" : "isset(int) is no \n";
echo is_null($int) ? "is_null(int) is yes \n" : "is_null(int) is no \n";
echo empty($int) ? "empty(int) is yes \n" : "empty(int) is no \n";
/*
 if is no
? is no 
isset is yes 
is_null is no 
empty is yes 
 */
echo PHP_EOL . '$null= null ' . "  输出判断\n";
$null = null;
if ($null)
    echo "if(null) is yes \n";
else echo "if(null) is no\n";
echo $null ? " null ? is yes \n" : " null ? is no \n";
echo isset($null) ? "isset(null) is yes \n" : "isset(null) is no \n";
echo is_null($null) ? "is_null(null) is yes \n" : "is_null(null) is no \n";
echo empty($null) ? "empty(null) is yes \n" : "empty(null) is no \n";
/*
 if is no
? is no 
isset is no 
is_null is yes 
empty is yes 
 */

echo PHP_EOL . '$bool = false' . "    输出判\n";
$bool = false;
if ($bool)
    echo "if(bool) is yes \n";
else echo "if(bool) is no\n";
echo $bool ? "(bool)? is yes \n" : "(bool)? is no \n";
echo isset($bool) ? "isset(bool) is yes \n" : "isset(bool) is no \n";
echo is_null($bool) ? "is_null(bool) is yes \n" : "is_null(bool) is no \n";
echo empty($bool) ? "empty(bool) is yes \n" : "empty(bool) is no \n";
/*
 if is no
? is no 
isset is yes 
is_null is no 
empty is yes 
 */

echo PHP_EOL . '$bool = true' . "   输出判断\n";
$bool = true;
if ($bool)
    echo "if(bool) is yes \n";
else echo "if(bool) is no\n";
echo $bool ? "(bool)? is yes \n" : "(bool)? is no \n";
echo isset($bool) ? "isset(bool) is yes \n" : "isset(bool) is no \n";
echo is_null($bool) ? "is_null(bool) is yes \n" : "is_null(bool) is no \n";
echo empty($bool) ? "empty(bool) is yes \n" : "empty(bool) is no \n";
/*
 if is yes 
? is yes 
isset is yes 
is_null is no 
empty is no 
 */
echo PHP_EOL . "unset(objA)后判断isset和empty输出判断\n";
unset($objA);
echo isset($objA) ? "isset(objA) is yes \n" : "isset(objA) is no \n";
echo empty($objA) ? "empty(objA) is yes \n" : "empty(objA) is no \n";
/*
 isset is no 
empty is yes 
 */
exit;


?>