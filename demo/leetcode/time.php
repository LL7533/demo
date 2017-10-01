<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/16
 * Time: 20:06
 */
require_once 'runtime.php';

for ($i=0;$i<=9;$i++){
    $t = pow(10,$i);
    $y=0;
    runtime::star($i);
    for($z=0;$z<$t;$z++){
        $y++;
    }
    echo  '10的'.$i.'次方'.$t;
    runtime::end($i);
}
