<?php

/**
 * strcmp 函数使用对比--区分大小写，并且是按字符替换，同时只替换一遍
 */
$str = "LAMP";
$str1 = "LAMPBrother";
$strc = strcmp($str, $str1);
switch ($strc) {
    case 1:
        echo "str > str1";
        break;
    case -1:
        echo "str < str1";
        break;
    case 0:
        echo "str=str1";
        break;
    default:
        echo "str <> str1";
}
var_dump($strc);

?>