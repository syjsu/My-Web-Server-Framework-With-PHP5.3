<?php
	$html = "<b>bold text</b><a href=howdy.html>click me</a>";
	preg_match_all ("/(<([\w]+)[^>]*>)(.*)(<\/\\2>)/", $html, $matches);
	var_dump($matches);
?>