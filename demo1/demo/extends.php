<?php

/**
 * 类继承--函数覆盖
 * Class A
 */
class A
{
    public function __construct()
    {
        echo "Class A...<br/>" . PHP_EOL;
    }
}

class B extends A
{
    public function __construct()
    {
        echo "Class B...<br/>" . PHP_EOL;
        parent::__construct();
    }
}

new B();
?>