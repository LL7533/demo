<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/20
 * Time: 下午1:34
 */
namespace Pcntl;

trait PcntlTrait
{
    private $workers = 5;

    public function worker($count)
    {
        $this->workers = $count;
    }

    public function pcntl_call_get_menu_info_by_menu_list($all, $callback)
    {
        $all = array_chunk($all,$this->workers,true);
        $countNo = count($all);
        foreach($all as $k=> $v){
            $pids = [];
            $pids[$k] = pcntl_fork();
            switch($pids[$k]){
                case -1:
                    echo "fork error :$k \r\n";
                    exit;
                case 0:
                    try{
                        $data = $callback($v);
                    }catch (\Exception $e){
                        echo ($e->getMessage());
                    }
                    exit;
                default:
                    break;
            }
        }

//        $pids = [];
//        for($i = 0; $i < $this->workers; $i++){
//            $pids[$i] = pcntl_fork();
//            switch ($pids[$i]) {
//                case -1:
//                    echo "fork error : {$i} \r\n";
//                    exit;
//                case 0:
//                    $data = [];
//                    try {
//                        $data = $callback(array_slice($all, $i * $perNum, $perNum));
//                    } catch(\Exception $e) {
//                        echo ($e->getMessage());
//                    }
//
//                    $shm_key = ftok(__FILE__, 't') . getmypid();
//                    $data = json_encode($data);
//                    $shm_id = shmop_open($shm_key, "c", 0777, strlen($data) + 10);
//                    shmop_write($shm_id, $data, 0);
//                    shmop_close($shm_id);
//                    exit;
//                default:
//                    break;
//            }
//        }

        // only master process will go into here
//        $ret = [];
//        foreach ($pids as $i => $pid) {
//            if($pid) {
//                pcntl_waitpid($pid, $status);
//
//                $shm_key = ftok(__FILE__, 't') . $pid;
//                $shm_id = shmop_open($shm_key, "w", 0, 0);
//
//                $data = trim(shmop_read($shm_id, 0, shmop_size($shm_id)));
//                $data = json_decode($data, true);
//                $ret = array_merge($ret, $data);
//                @shmop_close($shm_id);
//                @shmop_delete($shm_id);
//            }
//        }

        return [];
    }
}