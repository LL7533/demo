<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/13
 * Time: 10:52
 * 3 Longest Substring Without Repeating Characters
 * 在给定一个字符串中找没有重复字母的最长子串,大小写敏感
 * 如"abcabcbb",则结果为 "abc"
 * 如"bbbbb",则结果为 "b"
 * 如"pwwkew",则结果为 "wke"
 */
require_once 'runtime.php';
$string = "pwwkew";
$string = "aabcacbabcdaajskhgdscnbjk";
function huadong($string)
{
    runtime::star();
    $freq = [];//临时数组
    $left =0;//左边界
    $right = -1;//右边界
    while ($left +1 < strlen($string)){
        if ($right+1 < strlen($string) && !isset($freq[$string[$right+1]])){
            $right ++;
            $freq[$string[$right]] = $right;
        }elseif(isset($string[$right+1]) && isset($freq[$string[$right+1]])){
            unset($freq[$string[$left]]);
            $left ++;
        }elseif ($right +1 == strlen($string)){
            break;
        }
    }
    runtime::end();
    return implode(',',array_keys($freq));
}
echo  huadong($string).PHP_EOL;