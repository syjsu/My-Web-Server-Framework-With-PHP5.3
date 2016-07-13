<?php
	$str = 'index-index-1.html';
	$arr = array(0=>"index",1=>"index",2=>"1.html");

	
	echo $arr[count($arr)-1];	
	$arr1 = str_replace(".html",'',$arr[count($arr)-1]);
	$arr[count($arr)-1] = $arr1;
	var_dump($arr);
?>