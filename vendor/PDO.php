<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/2
 * Time: 下午11:25
 */

namespace vendor;
class PDO{
    private static $objConf =[];
    public static function instance($dbConf=[])
    {
        $key = md5($dbConf);
        if(empty(self::$objConf[$key])){
            self::$objConf[$key] = new PDO(
                $dbConf['dsn'],
                $dbConf['user'],
                $dbConf['password'],
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $dbConf['charset'] . ";",
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                ]
            );
        }
        return self::$objConf[$key];
    }

}