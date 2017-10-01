<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/5/6
 * Time: 17:20
 */

class saveData {
    const CHANNEL_ID = 80;

    const COMMONCGI_HOST = 'http://commoncgi.dev.wepiao.com';
    const COMMONCGI_TOKEN = self::COMMONCGI_HOST . '/common/default/encrypt';
    const MYSQL_HOST = ['host'   => '192.168.101.77', 'port'   => '3306','dbname' => 'db_app', 'user'   => 'test', 'passwd' => 'test',];

    const API_HOST = 'dev-app-api.wepiao.com';
    const GEWARA_FAVORITE_CINEMA = self::API_HOST . '/v1/cinemas/%s/favorite';  //关注影院
    const  GEWARA_FAVORITE_ACTOR = self::API_HOST.'/v1/actors/%s/like';
    const LIST_COUNT = 10;


//    private $limit = 0;

    /**
     * 影院清洗
     */
    public function saveDataInfo($where='',$star=1,$end=39366)
    {
        $where = empty($where)? '':" tag='$where' and ";
        $listType=true;
        $maxid = $star;
        while ($listType){
            $arrData = $this->getSqlInfo($where,$star,$end,$maxid);
            foreach ($arrData as $val){
                if(empty($val) || empty($val['recordid']) || empty($val['memberid'])){
                    $this->saveLog($val['tag'].'_null_data_recordid_memberid_',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
                }else{
                    switch ($val['tag']){
                        case 'star':
                            $this->saveActor($val);
                            break;
                        case 'cinema':
                            $this->saveCinema($val);
                            break;
                        default:
                            $this->saveLog('other_more',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
                    }
                }
            }
            if($maxid > $end)
                $listType =false;
            $maxid += self::LIST_COUNT;
        }
    }

    /**
     * 处理关注影院
     * @param $val
     */
    public function saveCinema($val)
    {
        $cinemaId = $this->getCinemaId($val['recordid']);
//        $cinemaId ='1015111';
        if(empty($cinemaId)){
            $this->saveLog($val['tag'].'_no_wy_id',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
            return false;
        }
        $token = $this->getToken(json_encode(['gewaraid'=>$val['memberid']]));
        if(empty($token)){
            $this->saveLog($val['tag'].'_no_token',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
            return false;
        }
        $arrData = ['channelId'=>self::CHANNEL_ID,'status'=>0];//这个特殊，0是收藏
        $url = str_replace('%s',$cinemaId,self::GEWARA_FAVORITE_CINEMA);
        $arrHeader = ['token:'.$token];
        $res = $this->getHttp($url,$arrData,$arrHeader);
        if(isset($res['ret']) && $res['ret'] == 0){
            $this->saveLog($val['tag'].'_favorite_ok',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
        }else{
            $this->saveLog($val['tag'].'_favorite_error',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
        }
    }

    /**
     * 关注影人
     * @param $val
     * @return bool
     */
    public function saveActor($val)
    {
        $actorId = $this->getActorId($val['recordid']);
        $actorId = '1258132';
        if(empty($actorId)){
            $this->saveLog($val['tag'].'_no_wy_id',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
            return false;
        }
        $token = $this->getToken(json_encode(['gewaraid'=>$val['memberid']]));
        if(empty($token)){
            $this->saveLog($val['tag'].'_no_token',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
            return false;
        }
        $arrData = ['channelId'=>self::CHANNEL_ID,'status'=>1,'actorId'=>$actorId];//这个1是收藏
        $url = str_replace('%s',$actorId,self::GEWARA_FAVORITE_ACTOR);
        $arrHeader = ['token:'.$token];
        $res = $this->getHttp($url,$arrData,$arrHeader);
        if(isset($res['ret']) && $res['ret'] == 0){
            $this->saveLog($val['tag'].'_favorite_ok',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
        }else{
            $this->saveLog($val['tag'].'_favorite_error',$val['id'].'_'.$val['recordid'].'_'.$val['memberid']);
        }
    }
    /*
     * 获取token
     */
    public function getToken($str)
    {
        $token = $this->getHttp(self::COMMONCGI_TOKEN,['channelId'=>self::CHANNEL_ID,'str'=>$str]);
        return isset($token['data']['encryptStr'])?$token['data']['encryptStr']:'';
    }

    /**
     * 获取娱票儿id
     * @param $gewaraCinemaId
     */
    public function getCinemaId($gewaraCinemaId)
    {
        $arrGewaraCinema = require_once 'gewaraCinemaIdList.php';
        return isset($arrGewaraCinema[$gewaraCinemaId])?$arrGewaraCinema[$gewaraCinemaId]:'';
    }
    /**
     * 获取娱票儿id
     * @param $gewaraCinemaId
     */
    public function getActorId($gewaraId)
    {
        $arrGewara = require_once 'gewaraCinemaIdList.php';
        return isset($arrGewara[$gewaraId])?$arrGewara[$gewaraId]:'';
    }

    /**
     * 根据条件获取内容
     * @param string $where
     * @param $star
     * @param $end
     * @param int $maxid
     * @return mixed
     */
    public function getSqlInfo($where = '',$star,$end,$maxid=0)
    {
        $sql = "select * from gewara_treasure WHERE  $where id >= $star and id <= $end  AND id >= $maxid ORDER BY id asc limit  ".self::LIST_COUNT;
        $this->saveLog('sql',$sql);
        return $this->getPdo()->fetchArrayBySql($sql);
    }
    /**
     * 执行http
     * @param $url
     * @param $arrData
     * @param array $header
     */
    public function getHttp($url,$arrData,$header=[])
    {
        require_once 'Http.php';
        $http = new Http();
        $strData = $http->_formType($arrData);
        //增加request header头信息
        $arrHeader = [
            'requestId: 123' ,//在头部也传requestId
            'charset=utf-8',
        ];
        $arrHeader = array_merge($arrHeader,$header);
        $http->setTimeout(5);
        $http->setHttpHeader($arrHeader);
        $response = $http->post($url, $strData);
        $response_data = json_decode($response['response'], true);
        return $response_data;
    }

    /**
     * @param null $dbType
     * @param null $tableName
     * @return mixed
     */
    public function getPdo($tableName = 'gewara_treasure')
    {
        include_once 'pdoManager/pdoManager.php';
        return \pdoManager\pdoManager::getInstance(self::MYSQL_HOST, $tableName);
    }

    /**
     * 记录日志
     * @param $type
     * @param $info
     */
    public function saveLog($type,$info)
    {
        $path = __DIR__.'/log/'.$type;
        echo $type ."_ $info \n";
        error_log($info."\n",3,$path);
    }

}
$input = getopt('w:s:e:');
if(empty($input['w']) && empty($input['s']) && empty($input['e'])){
    exit("must input -w,-s,-n!!! \n");
}
$saeData = new  saveData();
$saeData->saveDataInfo($input['w'],$input['s'],$input['e']);
