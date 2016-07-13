<?php
	$string = "The quick brown fox jumped over the lazy dog.";
	
	$pattern = array("/The/","/fox/");
	
	$replacement = array("a","bear");
	
	echo preg_replace($pattern,$replacement,$string);
?>