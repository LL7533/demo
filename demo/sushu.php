<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/16
 * Time: 20:52
 * 判断当前数据是否是素数
 */
$n = 19;
function is_sushu($n)
{
    if ($n <= 1)
        return false;
    for ($t = 2; $t * $t <= $n; $t++) {
        if ($n % $t == 0) {
            return false;
        }
    }
    return true;
}

var_dump(is_sushu($n));