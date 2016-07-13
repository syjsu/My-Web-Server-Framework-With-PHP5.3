<?php
	$mysql = new SaeMysql();
	$sql = 'select * from stu';
	$data = $mysql->get_data($sql);
	var_dump($data);
?>