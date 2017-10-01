<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/28
 * Time: 16:21
 */
//求月份的天数
function getDays($date){
    $days=date("t",strtotime($date));
    return $days;
}

//2015 年12 月
$date="2015-02";
echo getDays($date);