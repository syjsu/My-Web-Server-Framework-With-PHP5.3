<?php
	// 从 URL 中取得主机名
	preg_match("/^(http:\/\/)?([^\/]+)/i",
	    "http://www.php.net/index.html", $matches);
	$host = $matches[2];
	var_dump($matches);
	// 从主机名中取得后面两段
	preg_match('/[^\.\/]+\.[^\.\/]+$/',$host,$matches);
	
	echo "domain name is: {$matches[0]}\n";
?>  
