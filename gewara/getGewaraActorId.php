<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/5/8
 * Time: 11:59
 */

$path = "/Users/liulong/Documents/gewaraActorList.csv";
$str= file_get_contents($path);
$arrData = explode("\n",$str);
$arrActor = [];
foreach ($arrData as $val)
{
    $val = explode(",",$val);
    if(isset($val[3]) && !empty(intval($val[3]))){
        $arrActor[$val[0]] = $val[3];
    }
}
$strInfo = '<?php'."\n".' return [ '."\n";
foreach ($arrActor as $key=>$value){
    $value = intval($value);
    $strInfo .=  "'$key'=>'$value',\n";
}
$strInfo .=  '];';
file_put_contents("gewaraActorIdList.php",$strInfo);