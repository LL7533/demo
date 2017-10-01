<?php

$arr = [];
$arr['table_name'] = 'treasure';
$arr['type'] = 'insert';
$arr['data'] = [];
$arr['data']['recordid'] =  123123123;
$arr['data']['memberid'] =  87655;
$arr['data']['tag'] =  'star';
$arr['data']['relatedid'] =  67890;
$arr['data']['addtime'] =  date('Y-m-d H:i:s',time());
$arr['data']['action'] =  'comment';

echo json_encode($arr);exit;

$arrRedisConf=['host' => '192.168.200.253', 'port' => 6379, 'timeout' => 3, "prefix" => ""];
$redis = new \Redis();
$ip = $arrRedisConf['host'];
$port = $arrRedisConf['port'];
$timeOut = isset($arrRedisConf['timeout']) ? $arrRedisConf['timeout'] : 10;
$prefix = isset($arrRedisConf['prefix']) ? $arrRedisConf['prefix'] : '';
$pwd = isset($arrRedisConf['password']) ? $arrRedisConf['password'] : '';
$databases = isset($arrRedisConf['database']) ? $arrRedisConf['database'] : 0;
$mixRet = $redis->connect($ip, $port, $timeOut);
if (!$mixRet) {
    throw new \Exception("Redis server can not connect!");
}
if ($pwd) {
    $redis->auth($pwd);
}
if ($prefix) {
    $redis->setOption(\Redis::OPT_PREFIX, $prefix);
}
if ($databases) {
    $redis->select($databases);
}

$key = "wx_ucc_newcomment_comment_sort_bad_count_movie:6071";
$r=$redis->get($key);
var_dump($r);exit;
?>