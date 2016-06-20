<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/17
 * Time: 下午10:50
 */
/*
$url ='http://www.biquge.la/book/';
$id = 14;
$dir = dirname(__FILE__);
$url .= $id.'/';
$info = file_get_contents($url);
$info = iconv('GBK','UTF-8',$info);
$preg = '/<a href="(.*?.html)">(.*?)<\/a>/i';
preg_match_all($preg,$info,$data);
$db = new Db('book');
$dbArticle = new Db('article');
if(!empty($data[1]) && !empty($data[2])){
    $bookId = $db->fetchOne(['oid'=>$id]);
    $bookId = !empty($bookId['id'])?$bookId['id']:'';
    if(empty($bookId)){
        //插入
        preg_match('#<h1>([^<]*)</h1>#',$info,$bookName);
        $bookName =$bookName[1];
        $insertData =[];
        $insertData['oid'] = $id;
        $insertData['name'] = $bookName;
       $bookId = $db->add($insertData);
    }
    if(empty($bookId)){
        echo '插入数据库失败';exit;
    }
    foreach($data[1] as $k=>$val){
        $urlid = explode('.',$val);
        if(count($urlid) != 2 || !is_numeric($urlid[0]) || $urlid[1] != 'html')
            continue;
        $urlid=$urlid[0];
        $articleInfo = file_get_contents($url.$val);
        $articleInfo = iconv('GBK','UTF-8',$articleInfo);
        $articleInfo=preg_replace("/<(\/?script.*?)>/si","",$articleInfo); //过滤script标签
        $articlePreg = '%<div id="content">(.*?)</div>%si';
        preg_match($articlePreg,$articleInfo,$article);
        $article = !empty($article[1])?$article[1]:'';
        $article = htmlspecialchars_decode($article);
        $article = preg_replace("/<(.*?)>/","",$article);
        if(!empty($article)){
            $articleDbInfo =$dbArticle->fetchOne(['wid'=>$urlid,'bid'=>$bookId]);
            if(empty($articleDbInfo)){
                $insertArticle = ['wid'=>$urlid,'bid'=>$bookId];
                $insertArticle['title'] =$data[2][$k];
                $insertArticle['info'] = $article;
                if($dbArticle->add($insertArticle)){
                    echo  $bookId.' '.$insertArticle['title'].' insert is ok'."\n";
                }else{
                    echo $bookId.' '.$insertArticle['title'].' insert is error'."\n";
                }
            }
        }
    }
}
*/
$baseUrl ='http://www.biquge.la/book/';
$pregMenuList = '/<a href="(.*?.html)">(.*?)<\/a>/i';
$pregarticle = '%<div id="content">(.*?)</div>%si';
$pregBookName = '#<h1>([^<]*)</h1>#';
$objInfo = new getInfo();
$objBook = new Db('book');
$objArticle = new Db('article');
for($i =1;$i<10;$i++)
{
    $url = $baseUrl.$i.'/';
    $html = $objInfo->getPageHtml($url);
    //判断书籍是否存在
    $bookId = $objBook->fetchOne(['oid'=>$i]);
    $bookId = !empty($bookId['id'])?$bookId['id']:'';
    if(empty($bookId)){//插入
        $insertData =[];
        $insertData['oid'] = $i;
        $insertData['name'] = $objInfo->getOneInfo($html,$pregBookName);
        if(empty($insertData['name'])){
            echo $i ." no book name error\n";
            continue;
        }
        $bookId = $objBook->add($insertData);
    }
    if(empty($bookId)){
        echo $i.' is error'."\n";
        continue;
    }
    //获取目录
    $bookMenu = $objInfo->getPageMenu($html,$pregMenuList);
    foreach($bookMenu[1] as $k=>$v){
        $title = $bookMenu[2][$k];
        if(empty($title)){
            echo $bookId.' '.$v." no title error";
            continue;
        }
        $bookArticle = $objArticle->fetchOne(['bid'=>$bookId,'wid'=>intval($v)]);
        if(!empty($bookArticle)){//存在，则不理
            echo $bookId.' '.intval($v).' in DB'."\n";
            continue;
        }
        //获取页面内容，
        $articleHtml = $objInfo->getPageHtml($url.$v);

        if(empty($articleHtml)){
            echo $v. ' no info '."\n";
            continue;
        }
        $articleHtml = $objInfo->getOneInfo($articleHtml,$pregarticle);
        $insertArticle = ['wid'=>intval($v),'bid'=>$bookId];
        $insertArticle['title'] =$title;
        $insertArticle['info'] = $articleHtml;
        if(empty($insertArticle['info'])){
            echo $bookId .' ' .$insertArticle['title']." no info error";
            continue;
        }
        $articleId =$objArticle->add($insertArticle);
        if($articleId){
            echo  $articleId.' '.$bookId.' '.$insertArticle['title'].' ok'."\n";
        }else{
            echo $bookId.' '.$insertArticle['title'].' insert is error'."\n";
        }
    }
}




class getInfo
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
        if($iconv != 'UTF-8')
            $info = iconv($iconv,'UTF-8',$info);
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

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
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
    public function fetchOne($where = '1', $fields = '*', $orderBy = null)
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
        $query = "SELECT {$fields} FROM `{$this->tableName}` WHERE {$where}";
        if ($orderBy) {
            $query .= " ORDER BY {$orderBy}";
        }
        $query .= " limit 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute($paramsValue);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        return $statement->fetch();
    }

    public function add($arrData=[])
    {
        $fields = array_keys($arrData);
        $strFields = '`' . implode('`,`', $fields) . '`';
        $strValues = ':' . implode(', :', $fields);
        $query = "INSERT INTO `{$this->tableName}` ({$strFields}) VALUES ({$strValues})";
        $statement = $this->pdo->prepare($query);
//        $params = array();
//        foreach ($fields as $field) {
//            $params[$field] = $entity->$field;
//        }

        $statement->execute($arrData);
        return $this->pdo->lastInsertId();
    }

}