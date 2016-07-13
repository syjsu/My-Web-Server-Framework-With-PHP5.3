<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>图书ISBN搜索实例--当前存在于mc中的图书的信息</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
		 <script type="text/javascript" src="http://yunphp.sinaapp.com/js/jquery-1.3.2.min.js"></script> 	
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>当前在mc中的图书的ISBN信息，只显示最后100条</h1>
			 <ol>
			 	<?php foreach ($isbn_list as $book) { ?>
			 	<li><?php echo $book ?></li>	
			 	<?php	} ?>
			 </ol>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>