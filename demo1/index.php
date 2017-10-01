<?php

$isRequest = $isPost = $isJson =  false;
$url = 'http://commoncgi.intra.wepiao.com/wepiao/app/ticket';
$arrPostData = ['openId'=>'weiying_26336848'];
$header = [];
if ($isRequest)
    $header = ['X-Request-Id: 1','charset=utf-8'];
if ($isJson){
    $header[] ='Content-Type: application/json';
    $arrPostData = json_encode($arrPostData);
}else{
    $arrPostData = http_build_query($arrPostData);
}
if(!$isPost){
    $url .= '?'.$arrPostData;
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_URL,$url);

if($isPost){
    curl_setopt($ch, CURLOPT_POST,$isPost );//post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arrPostData);
}

curl_setopt($ch,CURLOPT_HTTPHEADER,$header);//
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$data = curl_exec($ch);
curl_close($ch);
echo($data);exit;





$date = date('Ymd',time());
echo strtotime($date);exit;
$dbRe = [];
$dbRe['created'] = 1475088133;
$dbRe['baseFavorCount'] = 250 ;
$dbRe['favorCount'] = 5 ;
$dbRe['replyCount'] = 0;

$iDateCount = (strtotime(date('Ymd', time())) - strtotime(date('Ymd', $dbRe['created']))) / 86400;
echo  intval((($dbRe['baseFavorCount'] + $dbRe['favorCount']) + 2 * $dbRe['replyCount']) / ($iDateCount + 1) * 100);
exit;




$arrData= [];
$arrData['id'] = 6;
$arrData['name'] = '2a';
$where = '';
foreach(array_keys($arrData) as $val){
    $where .= !empty($where)? ' AND '.$val .' = :'.$val.' ':$val.'=:'.$val;
}
echo $where;exit;
$t+=1;
echo $t;exit;

var_dump(is_array([]));
exit;

$arrData=['13','23','133','23'];
$arrData1= ['23'];
$arr = array_merge(array_diff($arrData, array('23')));
print_r($arr);exit;
phpinfo();exit;

echo json_encode(['a'=>[]]);
exit;
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
$arrPostData = [];
 
$arrPostData['v'] = '2015072401';
//$arrPostData['v'] = '2015082601';
//$arrPostData['v'] = '2015102701';
//$arrPostData['v'] = '2015110401';
//$arrPostData['v'] = '2015121801';
 
//$arrPostData['uid'] =1000;
//$arrPostData['content'] = '加我买微信电影票比团购至少便宜12元22222111111111你你不吃亏你不吃亏ss';
//$arrPostData['score'] = 100;
$arrPostData['movieId'] = 5968;
$arrPostData['channelId'] = 3;
$arrPostData['cityId'] = '10';
/*
//$arrPostData['content'] = '123';
$arrPostData['commentId'] = 100;
$arrPostData['count'] = 10;
$arrPostData['platForm'] =112121;
$arrPostData['nikeName'] ='张3';
$arrPostData['mobileNo'] = '';
$arrPostData['password'] = '111111';
$arrPostData['nickName'] = '111111';
*/
/*
//weixin
$arrPostData['openId'] ='oCOu6jo4ue7XQuFdgTu-cNsyqEcE';
//$arrPostData['accessToken'] ='OezXcEiiBSKSxW0eoylIeBgRNxX5-WgIFZ-hhB_yJ5QlbOepXQmQsZJ-MPihBDb__Ppt1hSzK4P_3Hizo676yasvV-f395-8-ciy_KM_3lppUc-AMg-SEIFPwbIEYihJ3GbEQT4FL1_a_J-U8E556A';
$arrPostData['unionId'] ='owJ__t3jKcveAn2Qj7ux8yiCg_0Q';
$arrPostData['otherId'] =11;
$arrPostData['orderId'] = '151110174933586792';
*/
//qq
//$arrPostData['accessToken']='F8DBC63AF0EE00D34FF2531178D4B722';
//$arrPostData['openId']='E71E033B0697F04DA641C97AB9E45F05';
//$arrPostData['oauthConsumerKey'] ='100697546'; //固定
//$arrPostData['otherId'] =12;
//sina
//$arrPostData['openId'] ='197173001';
//$arrPostData['accessToken']='2.00zCL8JCCVJZOCf533d4fe43zBWHqD';
//$arrPostData['sinaUid']="1971730013";
//$arrPostData['otherId'] =10;
 
$getInfo = new getInfo();
$arrData =$getInfo->curlopen($arrPostData);
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
$url="http://androidcgi.wepiao.com/user/mobile-register";
$url ="http://c.wepiao.com/version/release";
$url ="http://moviedatabase.wepiao.com/movie/info";
$url="http://app.pre.wepiao.com/movie/get-hot-comments";
//$url="http://app.test.wepiao.com/user/is-mobile-no";
//$url="http://androidcgi.wepiao.com/order/order-confirm";
//$url="http://androidcgi.wepiao.com/order/order-query";
$url = "app.test.wepiao.com/comment/save";
$url = "app.test.wepiao.com/comment/add-reply";
$url="http://androidcgi.wepiao.com/movie/info";
//$url="http://app.pre.wepiao.com/movie/get-movie-actor-list";
//统一拼凑必传字段
$arrPostData['from'] = '987654321';
$arrPostData['fromId'] = '987654321';
$arrPostData['t'] =time();
$arrPostData['platForm'] = 1;
$arrPostData['appkey'] = '8';
$sign ='kXjs1jILjD9Qj57I3C56B05074';
$arrPostData['appkey'] = '9';
$sign ='d3dRTY3jgPW1dlVE58415ca6ea';
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
 
echo$data;
//$data = json_decode($data,true);
//return  $data;
}
}

?>