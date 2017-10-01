
<?php
 require '../vendor/autoload.php';

 function p ($param) 
 { 
 	if (!is_array($param) && !is_object($param)) 
 	{ 
 		echo $param; return true; 
 	} 
 	echo '<pre>'; 
 	print_r($param); 
 	echo '</pre>'; 
 }  	
 $client = new ElasticsearchClient();  	//创建索引/添加mapping/到批量添加数据 //bulking (批量添加数据) 
 $indexParam['index'] = 'info'; //info库 // 
 $indexParam['type'] = 'news';//新闻信息 // 
 $indexParam['body']['settings'] = array( // //设置setting信息 // 
	 'number_of_shards' => 3,//1个索引分3片 // 
	 'number_of_replicas' => true,//保留一个副本 // // 
	 'refresh_interval' => -1 // 
 );  	//创建mapping 
 $mapParam = array( 
 	'_source' => array( 'enable' => true ), 
 	'properties' => array( 
 		'title' => array( 'type' => 'string', 'analyzer' => 'standard' ),
 		'score'=>array( 'type' => 'integer', 'index' => 'not_analyzed' ), 
 		'url' => array( 'type' => 'string', 'index'=> 'not_analyzed' ) ) );  	
 $indexParam['body']['mappings']['news'] = $mapParam; $res = $client -> indices() -> create($indexParam); // 
 p($indexParam);  	
 $bulk = array('index'=>'info','type'=>'news'); //bulk批量生成 
 for($i = 1; $i <= 1000; $i ++) 
 { 
 	$bulk['body'][]=array( 'index' => array( '_id'=>$i ), );  	
  	$bulk['body'][]=array(   'title'=>RandStr(), 'score'=>mt_rand('0','101'), 'url'=>'http://www.2144.cn'   ); 
 } 
 $res = $client->bulk($bulk); 
 p($res);   //测试函数 
 function RandStr() 
 {
 	 $zm = range('aa','zz'); 
 	 $zm = array_map(
 	 	function($a)
 	 	{ 
 	 		$str = ''; 
 	 		for ($i = 0; $i < 10; $i ++) { 
 	 			$str .= $a; 
 	 		} 
 	 		return $str; 
 	 }, $zm);
 	  $num = range('1900','2000'); $merge = array_merge($zm,$num); shuffle($merge); return substr(str_shuffle(join('',$merge)),0,mt_rand(8,14)); }