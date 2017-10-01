<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/1/10
 * Time: 下午12:30
 */


/**
 * crc32取模
 * Class test
 */
$test = new test();
for ($i = 100; $i <= 200; $i++)
    echo $test->get_hash_table($i) . "\n";

exit;

class test
{
    /**
     * @param $table
     * @param $userid
     * @return string
     */
    const TABLE_NAME = "user_order";

    function get_hash_table($userid, $table = '')
    {
        $table = !empty($table) ? $table : Self::TABLE_NAME;
        $str = abs(crc32($userid)) % 60 + 1;

        return $table . "_" . $str;
    }

}