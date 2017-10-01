<?php
echo urldecode('http://mqq.wepiao.com/cgi/bonus_proxy.php?url=http%3A%2F%2Fmqq.wepiao.com%2Fcomment_list.html%3Fmovie_id%3D6246%26sort_by%3Dtime%26comment_id%3D4169456%26from%3Dgroupmessage%26isappinstalled%3D1%26_%3D1464676033345%26error%3Dnologin%26code%3D%26_%3D1464676033850%26error%3Dnologin%26code%3D%26_%3D1464676034332%26error%3Dnologin%26code%3D%26_%3D1464676034809%26error%3Dnologin%26code%3D%26_%3D1464676035279%26error%3Dnologin%26code%3D%26_%3D1464676035744%26error%3Dnologin%26code%3D%26_%3D1464676036183%26error%3Dnologin%26code%3D%26_%3D1464676036667%26error%3Dnologin%26code%3D%26_%3D1464676037171%26error%3Dnologin%26code%3D%26_%3D1464676037694%26error%3Dnologin%26code%3D%26_%3D1464676038164%26error%3Dnologin%26code%3D%26_%3D1464676038657%26error%3Dnologin%26code%3D%26_%3D1464676039107%26error%3Dnologin%26code%3D%26_%3D1464676039594%26error%3Dnologin%26code%3D%26_%3D1464676040092%26error%3Dnologin%26code%3D%26_%3D1464676040547%26error%3Dnologin%26code%3D%26_%3D1464676041068%26error%3Dnologin%26code%3D%26_%3D1464676041535%26error%3Dnologin%26code%3D%26_%3D1464676041987%26error%3Dnologin%26code%3D%26_%3D1464676042527%26error%3Dnologin%26code%3D%26_%3D1464676043044%26error%3Dnologin%26code%3D%26_%3D1464676043808%26error%3Dnologin%26code%3D%26_%3D1464676044528%26error%3Dnologin%26code%3D%26_%3D1464676045241%26error%3Dnologin%26code%3D%26_%3D1464676045832%26error%3Dnologin%26code%3D%26_%3D1464676046318%26error%3Dnologin%26code%3D%26_%3D1464676046789%26error%3Dnologin%26code%3D%26_%3D1464676047351%26error%3Dnologin%26code%3D%26_%3D1464676047981%26error%3Dnologin%26code%3D%26_%3D1464676048532%26error%3Dnologin%26code%3D%26_%3D1464676049239%26error%3Dnologin%26code%3D%26_%3D1464676049929%26error%3Dnologin%26code%3D%26_%3D1464676050509%26error%3Dnologin%26code%3D%26_%3D1464676051158%26error%3Dnologin%26code%3D%26_%3D1464676051663%26error%3Dnologin%26code%3D%26_%3D1464676052193%26error%3Dnologin%26code%3D%26_%3D1464676052745%26error%3Dnologin%26code%3D%26_%3D1464676053377%26error%3Dnologin%26code%3D%26_%3D1464676053905%26error%3Dnologin%26code%3D%26_%3D1464676054481%26error%3Dnologin%26code%3D%26_%3D1464676054999%26error%3Dnologin%26code%3D%26_%3D1464676055532%26error%3Dnologin%26code%3D%26_%3D1464676056074%26error%3Dnologin%26code%3D%26_%3D1464676056580%26error%3Dnologin%26code%3D%26_%3D1464676057092%26error%3Dnologin%26code%3D%26_%3D1464676057657%26error%3Dnologin%26code%3D%26_%3D1464676058240%26error%3Dnologin%26code%3D%26_%3D1464676058778%26error%3Dnologin%26code%3D%26_%3D1464676059291%26error%3Dnologin%26code%3D%26_%3D1464676059802&error=nologin&code=');
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
 
//$arrPostData['v'] = '2015072401';
//$arrPostData['v'] = '2015082601';
//$arrPostData['v'] = '2015102701';
//$arrPostData['v'] = '2015110401';
//$arrPostData['v'] = '2015121801';
//$arrPostData['v'] = '2016022301';
$arrPostData['v'] = '2016050901';
//$arrPostData['fromId'] = '987654321';
 
//$arrPostData['uid'] =1000;
//$arrPostData['content'] = '加我买微信电影票比团购至少便宜12元22222111111111你你不吃亏你不吃亏ss';
//$arrPostData['score'] = 100;
//$arrPostData['movieId'] = '5742';
//$arrPostData['channelId'] = '9';
$arrPostData['from'] = '1212121212';
//$arrPostData['want'] = '1';
$arrPostData['page'] = 1;
$arrPostData['num'] = 10;
$arrPostData['appkey'] = '8';
//$arrPostData['uid'] ='18546';
//$arrPostData['uid'] = '10000';
//$arrPostData['cityId'] = '10';
// $arrPostData['openId'] = 'weiying_59807';
$arrPostData['movieId'] = 6033;
//$arrPostData['movieId'] =6644;
//$arrPostData['sortBy'] ='recommend';
//$arrPostData['keyWord'] ='叶问';
//$arrPostData['commentId'] = 203483;
//$arrPostData['openId'] = 'weiying_23786932';

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
//    $url="http://app.pre.wepiao.com/resource/day-sign-paging";
   // $url="http://app.pre.wepiao.com/resource/day-sign";
 //   $url ="http://apppre.wepiao.com/movie/get-movie-comments";
    $url ="http://apppre.wepiao.com/movie/news";
//统一拼凑必传字段
//$arrPostData['from'] = '987654321';
$arrPostData['t'] =time();
$arrPostData['platForm'] = 1;
    $arrPostData['appkey'] = !empty($arrPostData['appkey'])?$arrPostData['appkey']:8;
    if($arrPostData['appkey'] = '8') {
// $arrPostData['appkey'] = '8';
        $sign = 'QLvBHGA8RU36OXXLqAEM9ucadF';
    }
    if($arrPostData['appkey'] = '9') {
// $arrPostData['appkey'] = '8';
        $sign = 'jsIa9jL10Vxa9HMlEb9E4Fa15f';
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
 
echo$data;
//$data = json_decode($data,true);
//return  $data;
}
}

?>