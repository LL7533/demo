<?php
/*
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/17
 * Time: 下午10:50
 */
if (!function_exists("pcntl_fork")) {
    die("pcntl extention is must !");
}
$baseUrl ='http://www.biquge.la/book/';
$pregMenuList = '/<a href="(.*?.html)">(.*?)<\/a>/i';
$pregarticle = '%<div id="content">(.*?)</div>%si';
$pregBookName = '#<h1>([^<]*)</h1>#';
$objInfo = new getInfo();
$pdo = new Db();
for($i=1;$i<10;$i++){
    $url = $baseUrl.$i.'/';
    $html = $objInfo->getPageHtml($url);
    //判断书籍是否存在
    $bookId = $pdo->fetchOne('book',['oid'=>$i]);
    $bookId = !empty($bookId['id'])?$bookId['id']:'';
    if(empty($bookId)){//插入
        $insertData =[];
        $insertData['oid'] = $i;
        $insertData['name'] = $objInfo->getOneInfo($html,$pregBookName);
        if(empty($insertData['name'])){
            echo $i ." no book name error\n";
            continue;
        }
        $bookId = $pdo->add('book',$insertData);
    }
    if(empty($bookId)){
        echo $i.' is error'."\n";
        continue;
    }
    //获取目录
    $bookMenu = $objInfo->getPageMenu($html,$pregMenuList);
    $arrMenu = [];
    foreach($bookMenu[1] as $k=>$v){
        $arrMenu[intval($v)]=$url.$v;
    }
    $pcnl = new PcntlTrait();
    $pcnl->worker(5);
    $data = $pcnl->pcntl_call_get_menu_info_by_menu_list($arrMenu,$bookId,function($arrMenu,$bookId){
        if(empty($arrMenu) || empty($bookId))
            return [];
        $pdo = new Db();
        $objHtml = new GetInfo();
        foreach($arrMenu as $k=>$v){
            $articleInfo = $pdo->fetchOne('article',['bid'=>$bookId,'wid'=>$k]);
            if(!empty($articleInfo)){
                echo $bookId .' '.$k.' in DB'."\n";
                continue;
            }
            $articleInfo = [];
            $articleInfo['bid'] =$bookId;
            $articleInfo['wid'] = $k;
            $htmlInfo = $objHtml->getPageHtml($v);
            $articleInfo['title'] = $objHtml->getOneInfo($htmlInfo,'#<h1>([^<]*)</h1>#');
            $articleInfo['info'] = $objHtml->getOneInfo($htmlInfo,'%<div id="content">(.*?)</div>%si');
            if(empty($articleInfo['title'])){
                echo $bookId .' '.$k.' error no title'."\n";
                continue;
            }
            if(empty($articleInfo['info'])){
                echo $bookId .' '.$k.' error no info'."\n";
                continue;
            }
            if($pdo->add('article',$articleInfo)){
                echo $bookId .' '.$k.' insert is ok'."\n";
            }else{
                echo $bookId .' '.$k.' insert is error'."\n";
            }

        }
    });
}


class GetInfo
{
    private  $bookInfo = '';
    /**
     * 获取HTML内容
     * @param $url
     * @param $preg
     * @return mixed
     */
    public function getPageHtml($url)
    {
        return self::_getUrlInfo($url);
    }

    /**
     * 获取菜单列表
     * @param $info
     * @param $preg
     * @return mixed
     */
    public function getPageMenu($info,$preg)
    {
        preg_match_all($preg, $info, $data);
        return $data;
    }

    /**
     * 获取单个：：一个
     * @param $info
     * @param $preg
     * @return mixed
     */
    public function getPageOne($info,$preg)
    {
        preg_match($preg, $info, $data);
        return $data;
    }
    /**
     * 获取当前指定书籍的名称
     * @param $preg
     * @return mixed
     */
    public function getOneInfo($info,$preg)
    {
        $bookName = self::getPageOne($info,$preg);
        $bookName =!empty($bookName[1])?$bookName[1]:'';
        $bookName = self::delTag($bookName);
        return $bookName;
    }

    /**
     * 获取指定页面的内容
     * @param $url
     * @param $iconv
     * @return mixed|string
     */
    private function _getUrlInfo($url,$iconv='GBK')
    {
        $info = file_get_contents($url);
        if(!isset($info))
            return '';
        if($iconv != 'UTF-8')
            $info = iconv($iconv,'UTF-8//ignore',$info);
        $info=preg_replace("/<(\/?script.*?)>/si","",$info); //过滤script标签
        return $info;
    }

    /**
     * @param $info
     * @return mixed|string
     */
    public function delTag($info)
    {
        $info = htmlspecialchars_decode($info);
        $info = preg_replace("/<(.*?)>/","",$info);
        return $info;
    }


}

class Db{
    const HOST = '127.0.0.1';
    const USERNAME = 'root';
    const PWD ='';
    const DBNAME = 'book';
    private $pdo ='';
    private $tableName='';

    public function __construct()
    {
        //$this->tableName = $tableName;
        self::getContent();
    }

    /**
     * 链接
     */
    private function getContent()
    {
        $this->pdo = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME,self::USERNAME,self::PWD);
        $this->pdo->exec("SET CHARACTER SET utf8");
    }

    /**
     * 获取一条记录
     * @param string $oid
     * @return bool
     */
    public function fetchOne($tableName,$where = '1', $fields = '*', $orderBy = null)
    {
        $paramsValue = [];
        if(is_array($where)){
            $paramsWhere = '';
            foreach($where as $k=>$val){
                if(!empty($paramsWhere))
                    $paramsWhere .= ' AND ';
                $paramsWhere .= $k.'=:'.$k;
                $paramsValue[':'.$k] = $val;
            }
            $where = $paramsWhere;
        }
        $query = "SELECT {$fields} FROM `$tableName` WHERE {$where}";
        if ($orderBy) {
            $query .= " ORDER BY {$orderBy}";
        }
        $query .= " limit 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute($paramsValue);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        return $statement->fetch();
    }

    public function add($tableName,$arrData=[])
    {
        $fields = array_keys($arrData);
        $strFields = '`' . implode('`,`', $fields) . '`';
        $strValues = ':' . implode(', :', $fields);
        $query = "INSERT INTO `$tableName` ({$strFields}) VALUES ({$strValues})";
        $statement = $this->pdo->prepare($query);
//        $params = array();
//        foreach ($fields as $field) {
//            $params[$field] = $entity->$field;
//        }

        $statement->execute($arrData);
        return $this->pdo->lastInsertId();
    }

}

class PcntlTrait
{
    private $workers = 5;

    public function worker($count)
    {
        $this->workers = $count;
    }

    public function pcntl_call_get_menu_info_by_menu_list($all,$bookId, $callback)
    {
        $all = array_chunk($all,$this->workers,true);
        $countNo = count($all);
        foreach($all as $k=> $v){
            $pids = [];
            $pids[$k] = pcntl_fork();
            switch($pids[$k]){
                case -1:
                    echo "fork error :$k \r\n";
                    exit;
                case 0:
                    try{
                        $data = $callback($v,$bookId);
                    }catch (\Exception $e){
                        echo ($e->getMessage());
                    }
                    exit;
                default:
                    break;
            }
        }

//        $pids = [];
//        for($i = 0; $i < $this->workers; $i++){
//            $pids[$i] = pcntl_fork();
//            switch ($pids[$i]) {
//                case -1:
//                    echo "fork error : {$i} \r\n";
//                    exit;
//                case 0:
//                    $data = [];
//                    try {
//                        $data = $callback(array_slice($all, $i * $perNum, $perNum));
//                    } catch(\Exception $e) {
//                        echo ($e->getMessage());
//                    }
//
//                    $shm_key = ftok(__FILE__, 't') . getmypid();
//                    $data = json_encode($data);
//                    $shm_id = shmop_open($shm_key, "c", 0777, strlen($data) + 10);
//                    shmop_write($shm_id, $data, 0);
//                    shmop_close($shm_id);
//                    exit;
//                default:
//                    break;
//            }
//        }

        // only master process will go into here
//        $ret = [];
//        foreach ($pids as $i => $pid) {
//            if($pid) {
//                pcntl_waitpid($pid, $status);
//
//                $shm_key = ftok(__FILE__, 't') . $pid;
//                $shm_id = shmop_open($shm_key, "w", 0, 0);
//
//                $data = trim(shmop_read($shm_id, 0, shmop_size($shm_id)));
//                $data = json_decode($data, true);
//                $ret = array_merge($ret, $data);
//                @shmop_close($shm_id);
//                @shmop_delete($shm_id);
//            }
//        }

        return [];
    }
}