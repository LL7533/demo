<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 15/5/7
 * Time: 22:01
 */

/**
 * 针对数字的处理
 */
// 保留小数点，四舍五入
echo '保留小数点，四舍五入: sprintf("%.2f", 0.1265489) = ' . sprintf("%.2f", 0.1265489) . PHP_EOL;
//保留小数，不四舍五入
echo '保留小数，不四舍五入: substr(sprintf("%.3",0.1265489),0,-1) = ' . substr(sprintf("%.3f", 0.1265489), 0, -1) . PHP_EOL;
//取整--向上
echo '取整--向上: ceil(4.1)=' . ceil(4.1) . PHP_EOL;
//取整--向下
echo '取整--向下: floor(9.999) = ' . floor(9.999) . PHP_EOL;
//保留位数
echo '保留位数round(3.4)=' . round(3.4) . PHP_EOL;
//保留位数
echo '保留位数round(3.5)=' . round(3.5) . PHP_EOL;
//保留位数
echo '保留位数round(3.6，0)=' . round(3.6, 0) . PHP_EOL;
echo '保留位数round(1.95583, 2)=' . round(1.95583, 2) . PHP_EOL;
echo '保留位数round(1241757, -3)=' . round(1241757, -3) . PHP_EOL;
echo '保留位数round(5.045, 2)=' . round(5.045, 2) . PHP_EOL;
echo '保留位数round(5.055, 2)=' . round(5.055, 2) . PHP_EOL;
echo '保留位数round(5.0449, 2)=' . round(5.0449, 2) . PHP_EOL;