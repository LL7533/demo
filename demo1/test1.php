<?php

$arr = [];
$arr["id"]="123123";
$arr["commentId"] = "444555666";

print_r(reset($arr));exit;

$arr = [3];

$all = 1;

$res = $all ^ in_array(3, $arr);

var_dump($res);


?>
