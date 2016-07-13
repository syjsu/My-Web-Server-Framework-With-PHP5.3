<?php
	$fp = fopen('duopuda.txt','r');
	$fw = fopen('nokia.txt','a+');
	while (!feof($fp)) {
		$line = fgets($fp,4096);
		$temp = explode(',',$line);
		$str = '"","'.$temp[0].'","","","","","","","","","","","","'.substr($temp[1],0,-2).'","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""'."\r\n";
		fwrite($fw,$str);
	}
	fclose($fw);
	fclose($fp);
?>