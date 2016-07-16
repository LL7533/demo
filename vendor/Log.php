<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/2
 * Time: 下午10:44
 */
namespace vendor;
class Log
{
    public static function logFile($type,$info)
    {
        $fileName = __DIR__.'/../log/'.$type.'/'.date('Ymd').'.log';
        if(!is_file($fileName)){
            if(!is_dir(dirname($fileName))){
                @mkdir(dirname($fileName));
                @chmod(dirname($fileName),0777);
                file_put_contents($fileName,'');
            }
        }
        $info = date('Y-m-d H:i:s').is_array($info)?implode("\n",$info):$info;
        return error_log($info,3,$fileName);
    }
}