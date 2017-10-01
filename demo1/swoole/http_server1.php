<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/4/7
 * Time: 下午3:02
 */

$http = new swoole_http_server("0.0.0.0", 9501);
$http->set(array(
    'worker_num' => 600,   //工作进程数量
    'daemonize' => true, //是否作为守护进程
));
$http->on('request', function ($request, $response) {

    $phone = 13810057782;
    $redis = new Redis();
    $redis->connect('10.3.10.107', 6379);
    $redis->auth('crs-7i0bvt5z:IoE4I8cc');
    //$redis->select(4);
    $return = $redis->sIsMember('mobile_set',$phone);
    $response->end($return?1:0);
});

$http->start();