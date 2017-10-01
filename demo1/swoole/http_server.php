<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/4/7
 * Time: 下午3:02
 */

$http = new swoole_http_server("0.0.0.0", 9501);
$http->on('request', function ($request, $response) {

    /*
   // var_dump($request->get, $request->post);
    //$response->header("Content-Type", "text/html; charset=utf-8");
    $return = ['ret' => -1, 'sub' => -1, 'msg' => '', 'data' => ''];
    if(empty($request->get['movieId']) || empty($request->get['channelId'])){
        $return['msg'] = 'param error';
        $response->end(json_encode($return));
    }else{
        if(strstr($request->get['movieId'],'|')){
            $minMovieId = explode('|', $request->get['movieId']);
        }else{
            $minMovieId = $request->get['movieId'];
        }
        $redis = new Redis();
        $redis->connect('192.168.200.85', 6379);
        $redis->auth('123456');
        $redis->select(4);
        if(is_array($minMovieId)){
            $info =$redis->hMGet('mdb_movie_actor_oart',$minMovieId);
            $info = array_map('json_decode',$info);
        }
        else{
            $info =$redis->hGet('mdb_movie_actor_oart',$minMovieId);
            $info = json_decode($info);
        }
        $return['ret'] = 0;
        $return['sub'] = 0;
        $return['msg'] = 'success';
        $return['data'] = $info;
        $response->end(json_encode($return));
    }
*/
    /*
    $openId = 6033;
    $redis = new Redis();
    $redis->connect('10.66.143.17', 6379);
    $redis->auth('crs-i3c8j17l:Y1U3rOGu');
    //$redis->select(4);
    $return = $redis->sIsMember('mdb_movie_id_all',$openId);
    $response->end($return?1:0);
*/
    $response->end('hello word');

});

$http->start();