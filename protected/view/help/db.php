<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Db单表操作类----YunPHP帮助文档</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
	  	<h1>Mysq的单表操作类，继承与SaeMysql，实现常用的“增删改查”功能，提高效率
	  	<span><a href="/db/souce" target="_blank">
	 <img  class="source" src="/images/php_source.jpg" />
	 </a></span>
	  	</h1>
	  	<p><kbd>如果有分表之类的操作</kbd>，不能使用这个类，请使用SaeMysql！</p>
	  	<h2>函数列表</h2>
		<ul>
			<li>getById($table,$id)</li>
			<li>delById($table,$id)</li>
			<li>insertData($table,$data=array())</li>
			<li>updateData($table,$data,$condition = '')</li>
			<li>deleteData($table,$condition)</li>
			<li>selectData($table,$condition='')</li>
	    </ul>
		<h2>关于单例模式</h2>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这个一直在考虑，到底数据库的时候是否需要单例模式？希望高手给我解答一下。</p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>