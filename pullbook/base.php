<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/9
 * Time: 上午10:20
 */
class base{
    private $redisConfig=[];
    private $redisObj=[];
//初始化db,redis
    public function __construct(){
//        if(empty($this->dbConfig)){
//            $this->dbConfig = require_once(BASE_PATH.'/../config/db.php');
//        }
        if(empty($this->redisConfig)){
            $this->redisConfig = require_once(BASE_PATH.'/config/redis.php');
        }
    }

    public function getRedis($fun){
        $fun = md5($fun);
        if(empty($this->redisObj[$fun])){
            $this->redisObj[$fun] = new Redis();
            $this->redisObj[$fun]->connect($this->redisConfig['host'], $this->redisConfig['port'], $this->redisConfig['timeout']);
            if(!empty($this->redisConfig['password'])){
                $this->redisObj[$fun]->auth($this->redisConfig['password']);
            }
            if(!empty($this->redisConfig['prefix'])){
                $this->redisObj[$fun]->setOption(Redis::OPT_PREFIX,$this->redisConfig['prefix']);
            }
            if(!empty($this->redisConfig['database'])){
                $this->redisObj[$fun]->select($this->redisConfig['database']);
            }
        }
        return $this->redisObj[$fun];
    }
}