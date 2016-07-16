<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/2
 * Time: 下午10:36
 */
class base{


    /**
     * 日志记录类
     * @param $type
     * @param $info
     * @return bool
     */
    public function logFile($type,$info){
        return \vendor\Log::logFile($type,$info);
    }
}