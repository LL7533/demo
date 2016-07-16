<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/20
 * Time: 下午1:34
 */
namespace vendor;

class PcntlTrait
{
    private $workers = 5;
    private static $objInstance = [];

    /**
     * @return null|PcntlTrait
     */
    public static function instance($fun)
    {
        $fun = md5($fun);
        if(empty(self::$objInstance[$fun])){
            self::$objInstance[$fun] = new PcntlTrait();
        }
        return self::$objInstance[$fun];
    }

    public function worker($count)
    {
        $this->workers = $count;
    }

    /**
     * 定时起多个进程进行处理指定的函数--主要处理队列里的数据
     * @param $all
     * @param $type
     * @param $callback
     * @return array
     */
    public function pcntl_num($num, $callback)
    {
        for($i=0;$i<$this->workers;$i++){
            $pids[$i] = pcntl_fork();
            switch($pids[$i]){
                case -1:
                    echo "fork error :$i \r\n";
                    exit;
                case 0:
                    try{
                        $data = $callback($num);
                    }catch (\Exception $e){
                        echo ($e->getMessage());
                    }
                    exit;
                default:
                    break;
            }
        }
            return [];
    }

    /**
     * 接收数组进行处理的情况，直到处理完成
     * @param $all
     * @param $type
     * @param $callback
     * @return array
     */
    public function pcntl_run($all,$type, $callback)
    {
        if(count($all) < $this->workers){
            $callback($all,$type);
        }else{
            $countNo = ceil(count($all)/$this->workers);
            $all = array_chunk($all,$countNo,true);
            foreach($all as $k=> $v){
                $pids = [];
                $pids[$k] = pcntl_fork();
                switch($pids[$k]){
                    case -1:
                        echo "fork error :$k \r\n";
                        exit;
                    case 0:
                        try{
                            $data = $callback($v,$type);
                        }catch (\Exception $e){
                            echo ($e->getMessage());
                        }
                        exit;
                    default:
                        break;
                }
            }
        }
        return [];
    }
}