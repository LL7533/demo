<?php
$yac = new \Yac();
$kew1 = 'key1';
$kew2 = 'key2';
var_dump($yac->set($kew1,'123123'));exit;
$dispatchData = $yac->get($routeKey);
$cacheRouteVersion = $yac->get($keyRouteVersion);


?>
