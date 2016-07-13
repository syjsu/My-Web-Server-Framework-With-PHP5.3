<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> 登陆</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>登陆</h1>
			<form action="/stu/login_do" method="post">
			姓名：<input type="text" name="name" /><br/><br/>
			密码：<input type="text" name="psw" /><br/>
			<input type="submit" value="登陆" />
			</form>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>
