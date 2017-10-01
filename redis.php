<?php

$redisConf = ['host' => '10.66.176.219', 'port' => 28002, 'timeout' => 3, "prefix" => "show_ucc","database"=>1];
$redisConf = ['host' => '10.104.10.206', 'port' => 8008, 'timeout' => 3, "prefix" => "show_ucc","database"=>1];
$redis = new \Redis();
$mixRet = $redis->connect($redisConf['host'], $redisConf['port'], $redisConf['timeout']);
//$redis->setOption(\Redis::OPT_PREFIX, $redisConf['prefix']);
$redis->select($redisConf['database']);
$res = $redis->hSet('show_uccshow_user_comment_hash_show:7249F8A5F664C431E70FFFAA21B7A842','4196a667016144','222');
//$res = $redis->hSet('show_test','4196a667016144','22');
var_dump($res);exit;

?>
