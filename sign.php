<?php

$arrPostData = [];
$arrPostData['v'] = '2015121801';
$arrPostData['movieId'] = '5742';
$arrPostData['channelId'] = '9';
$arrPostData['from'] = '123456899';
$arrPostData['want'] = '1';
$arrPostData['page'] = '1';
$arrPostData['num'] = '10';
$arrPostData['appkey'] = '8';
$arrPostData['sortBy'] = 'time';
$arrPostData['city'] = '10';
$getInfo = new getInfo();
$arrData =$getInfo->curlopen($arrPostData);
class getInfo
{
    function curlopen($arrPostData=''){

        $type = empty($type)?'post':$type;
        $url="http://app.pre.wepiao.com/movie/get-hot-comments";
//统一拼凑必传字段
        $arrPostData['from'] = '987654321';
        $arrPostData['fromId'] = '987654321';
        $arrPostData['t'] =time();
        $arrPostData['platForm'] = 1;
        $arrPostData['appkey'] = !empty($arrPostData['appkey'])?$arrPostData['appkey']:10;
        $sign = 'zJwaQBQ553lHr6DfnX02WcJtZF';
        ksort($arrPostData);
        $strKey = urldecode(http_build_query($arrPostData));
        $strMd5 = MD5($sign. $strKey);
        $arrPostData['sign'] =  strtoupper($strMd5);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrPostData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);

        echo$data;
    }
}

?>