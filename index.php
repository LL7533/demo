<?php



/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/17
 * Time: 下午10:50
 */

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