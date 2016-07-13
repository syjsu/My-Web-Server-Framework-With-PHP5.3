<?php
	$str = '(this is the?> view of<? ?> "" index>>index _tpl_vars[\'name\'])';
	file_put_contents('saemc://%%77^774^774BE9C9%%index.html.php',$str);
	$res = file_get_contents('saemc://test.txt');
	var_dump($res);
