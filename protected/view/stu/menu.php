<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>学生管理系统----YunPHP实例</title>
		 <link rel='stylesheet' type='text/css' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>学生管理系统</h1>
			<h2>基本的增删改查(以及session的处理)</h2>
			<ul>
				<li><a href="/stu/reg">添加注册</a></li>
				<li><a href="/stu/login">登陆</a></li>
				<li><a href="/stu/stulist">信息列表</a></li>
				<li><a href="/stu/page">分页显示</a></li>
				<li><a href="/page">分页详解</a></li>
		    </ul>
	        <p>关于session的处理，这里列举一个例子，比如全站都可以游客访问，但是/stu/下面的方法都需要登录，只需要在其控制器StuAction.class.php中添加一个控制和跳转就行了。</p>
	        <p><code> public function __construct(){<br />
	          &nbsp;&nbsp;&nbsp;&nbsp;
session_start();
<br />
&nbsp;&nbsp;&nbsp;&nbsp;
parent::__construct();<br />
		&nbsp;&nbsp;&nbsp;&nbsp;	if($_SESSION['name'] == ''){<br />
				 &nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;login(); //转到登录函数处理 <br />
		&nbsp;	}<br />
}</code></p>
	        <h2>表结构</h2>
	        <p><code>CREATE TABLE IF NOT EXISTS `stu` (<br />
`id` int(11) NOT NULL auto_increment,<br />
`name` varchar(50) NOT NULL,<br />
`psw` varchar(100) NOT NULL,<br />
`school` varchar(50) NOT NULL,<br />
PRIMARY KEY  (`id`)<br />
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;</code></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>