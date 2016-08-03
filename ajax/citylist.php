<?php
	$cities=array(
			array('code'=>'1','name'=>"Beijing"),
			array('code'=>'2','name'=>"Shanghai"),
			array('code'=>'3','name'=>"Guangzhou"),
			array('code'=>'4','name'=>"Nanjing"),
			array('code'=>'5','name'=>"Wuhan"),
			array('code'=>'6','name'=>"Hangzhou"),
			array('code'=>'7','name'=>"Dalian"),
			array('code'=>'8','name'=>"Chongqing"),
			array('code'=>'9','name'=>"Xi'an"),
			array('code'=>'10','name'=>"Shenzhen")
	);
	echo json_encode(array("list"=>$cities));
?>