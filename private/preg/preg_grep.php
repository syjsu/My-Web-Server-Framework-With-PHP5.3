<?php
	$array = array(1.2,1.3,11,55);
	$res = preg_grep('/^(\d+)\.(\d+)$/',$array);
	var_dump($res);
	
?>