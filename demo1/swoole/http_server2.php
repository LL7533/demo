<?php
/*
$t='0';
if (is_numeric($t))
    echo '2222222';
if ($t !== '' && $t >= 0){
    echo '123';exit;
}else echo '11111';
exit;
//echo date('Y-m-d H:i:s',1431878399);exit;
//echo strtotime("20151001");exit;
 phpinfo();exit;
 */
$http = new swoole_http_server("0.0.0.0", 9501);
$http->on('request', function ($request, $response) {
$arrPostData = [];
$arrPostData['v'] = '2016022301';
$arrPostData['channelId'] = '9';
$arrPostData['from'] = '1212121212';
$arrPostData['appkey'] = '8';
//$arrPostData['uid'] ='18546';
$arrPostData['uid'] = '10000';
$arrPostData['cityId'] = '10';
$arrPostData['openId'] = 'weiying_59807';
$arrPostData['movieId'] = '6414';
$getInfo = new getInfo();
$arrData =$getInfo->curlopen($arrPostData);
 $response->end($arrData);
});

$http->start();
class getInfo
{
    function curlopen($arrPostData=''){

        $type = empty($type)?'post':$type;
//签名应该是算出来的
//$url="http://app.pre.wepiao.com/movie/list";
//$url="http://ioscgi.wepiao.com/user/get-userinfo-by-uid";
//$url="http://app.test.wepiao.com/comment/save";
//$url="http://app.pre.wepiao.com/comment/save";
//$url="http://ioscgi.wepiao.com/comment/save";
//$url="http://app.pre.wepiao.com/resource/list";
//$url ="http://androidcgi.wepiao.com/discovery-channel/list";
//$url ="http://app.pre.wepiao.com/discovery-channel/list";
//$url ="http://app.pre.wepiao.com/cinema/info";
// $url="http://androidcgi.wepiao.com/user/mobile-register";
//$url ="http://c.wepiao.com/version/release";
//$url ="http://moviedatabase.wepiao.com/movie/info";
//$url="http://app.pre.wepiao.com/movie/get-hot-comments";
//$url="http://app.test.wepiao.com/user/is-mobile-no";
//$url="http://androidcgi.wepiao.com/order/order-confirm";
//$url="http://androidcgi.wepiao.com/order/order-query";
//$url = "app.test.wepiao.com/comment/save";
//$url = "app.test.wepiao.com/comment/add-reply";
//$url="http://androidcgi.wepiao.com/movie/info";
//$url="http://app.pre.wepiao.com/movie/get-movie-actor-list";
//$url="http://app.pre.wepiao.com/movie/get-hot-comments";
//$url = "app.test.wepiao.com/movie/get-movie-comments";
//    $url = "app.test.wepiao.com/movie/seen";
//    $url="http://app.pre.wepiao.com/movie/get-movie-actor-list";
//    $url ="http://apppre.wepiao.com/movie/get-movie-comments";
//    $url = "http://apppre.wepiao.com/movie/get-comments";
//    $url ="http://apppre.wepiao.com/movie/want";
//    $url ="http://apppre.wepiao.com/user/wants";
        //  $url = "http://ioscgi.wepiao.com/active-cms/get-active-list";
        // $url="http://app.pre.wepiao.com/sche/cinema-list-by-movie";
        $url="http://app.pre.wepiao.com/resource/day-sign-paging";
        // $url="http://app.pre.wepiao.com/resource/day-sign";
//统一拼凑必传字段
//$arrPostData['from'] = '987654321';
        $arrPostData['fromId'] = '987654321';
        $arrPostData['t'] =time();
        $arrPostData['platForm'] = 1;
        $arrPostData['appkey'] = !empty($arrPostData['appkey'])?$arrPostData['appkey']:8;
        if($arrPostData['appkey'] = '8') {
// $arrPostData['appkey'] = '8';
            $sign = 'DFgoKYQPfJegWQN3ofcTFg6qfn';
        }
        if($arrPostData['appkey'] = '9') {
// $arrPostData['appkey'] = '8';
            $sign = 'zJwaQBQ553lHr6DfnX02WcJtZF';
        }
//$arrPostData['appkey'] = '9';
//$sign ='zJwaQBQ553lHr6DfnX02WcJtZF';
//生成sign签名
        ksort($arrPostData);
        $strKey = urldecode(http_build_query($arrPostData));
        $strMd5 = MD5($sign. $strKey);
        $arrPostData['sign'] =  strtoupper($strMd5);
//echo http_build_query($arrPostData);exit;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
//CURLOPT_HTTPHEADER => $headers,

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrPostData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
//return  $data;
    }
}

?>