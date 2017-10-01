<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/24
 * Time: 16:57
 */
//简单的单例
class A {
    private static $obj = null;
    private function __construct() {
    }
    private function __clone() {
    }
    static public function getObj() {
        if (is_null ( self::$obj ) || isset ( self::$obj )) {
            self::$obj = new self ();
        }
        return self::$obj;
    }
    public function getName() {
        echo 'hello world!';
    }
}