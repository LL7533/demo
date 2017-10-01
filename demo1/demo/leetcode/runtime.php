<?php

/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/16
 * Time: 19:36
 */
class runtime
{
    static $star = [];

    /**
     * 开始计时
     * @param int $num
     */
    static function star($num = 0)
    {
        self::$star[$num] = microtime(true);
    }

    /**
     * 结束计算
     * @param int $num
     */
    static function end($num = 0)
    {
        echo round(microtime(true) - self::$star[$num], 8) . ' S' . PHP_EOL;
    }
}