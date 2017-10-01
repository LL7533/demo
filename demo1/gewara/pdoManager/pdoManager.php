<?php
/**
 * 给外部用的对象，主要功能是实现惰性加载
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/6
 * Time: 18:54
 */
namespace pdoManager;

class pdoManager
{
    
    //保存自己的单例
    protected static $_self = [];
    
    //db配置
    protected $dbConf = [];
    
    //建立了链接的pdo对象
    protected $pdoConnection = [];
    
    //表名，为了兼容pdoOperator
    protected static $tableName = null;
    
    private function __construct()
    {
        return false;
    }
    
    //单例方法 -- 取消单例
    public static function getInstance($dbConf, $tableName)
    {
        self::$tableName = $tableName;
        $md5Conf = md5(json_encode($dbConf)) . '_' . strval(getmypid());;
//        if (empty(self::$_self[$md5Conf])) {
//            self::$_self[$md5Conf] = new self();
//            self::$_self[$md5Conf]->dbConf = $dbConf;
//        }
        self::$_self[$md5Conf] = new self();
        self::$_self[$md5Conf]->dbConf = $dbConf;
        
        return self::$_self[$md5Conf];
    }
    
    //关闭连接
    public static function closePdo($dbConf, $tableName)
    {
        self::$tableName = $tableName;
        $md5Conf = md5(json_encode($dbConf));
        self::$_self[$md5Conf] = null;
        
        return self::$_self[$md5Conf];
    }
    
    //创建pdo对象
    protected function createPdoConnection()
    {
        if (empty($this->pdoConnection)) {
            $dbConf = $this->dbConf;
            $dsn = "mysql:host={$dbConf['host']};port={$dbConf['port']};dbname={$dbConf['dbname']}";
            $user = $dbConf['user'];
            $pw = $dbConf['passwd'];
            $this->pdoConnection = new \PDO($dsn, $user, $pw);
        }
        
        return $this->pdoConnection;
    }
    
    //此类的关键，调用实际上是pdoOperator的操作方法,第一个参数
    public function __call($func, $params)
    {
        include_once 'pdoOperator.php';
        $pdoConnection = $this->createPdoConnection();
        $pdoOperator = pdoOperator::getInstance();
        $pdoOperator->setTableName(self::$tableName);
        $pdoOperator->setPdo($pdoConnection);
        #call_user_func(); 查看性能
        $argc = count($params);
        switch ($argc) {
            case 0:
                $return = $pdoOperator->$func();
                break;
            case 1:
                $return = $pdoOperator->$func($params[0]);
                break;
            case 2:
                $return = $pdoOperator->$func($params[0], $params[1]);
                break;
            case 3:
                $return = $pdoOperator->$func($params[0], $params[1], $params[2]);
                break;
            case 4:
                $return = $pdoOperator->$func($params[0], $params[1], $params[2], $params[3]);
                break;
            case 5:
                $return = $pdoOperator->$func($params[0], $params[1], $params[2], $params[3], $params[4]);
                break;
            default:
                throw new \Exception("error args in pdoOperator");
        }
        
        return $return;
    }
}