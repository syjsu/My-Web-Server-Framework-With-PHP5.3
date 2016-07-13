<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>各种分页</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
		 <style type="text/css">
			 p{text-decoration:none;}
			.page_style{border: 1px solid #ddd; padding: 2px 6px;; float:left; margin-left: 2px; text-align: center;}
			.page_style a{text-decoration: none;}
			.page_cur{border: 1px solid #ddd; padding: 2px 6px;; float:left; background:#666; margin-left: 2px;text-align: center; text-decoration: none;font-weight: bold}
			.page_cur a{text-decoration: none;}
		</style>
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
		<h1>各种分页</h1>
		<p>传给分页函数当前的url，总数和当前页数，以及必要的css给分页函数，分页函数返回一个页码的html</p>
		<h2>1--------总数<?php echo $total1;?> 每页<?php echo $per_page1; ?>条</h2>
		<p style="background: #f7f7f7"><?php  echo $page1; ?></p>
		<h2>2--------总数<?php echo $total2;?> 每页<?php echo $per_page2; ?>条</h2>
		<p style="background: #f7f7f7" class="page"><?php  echo $page2; ?></p>
		<h2>2--------总数<?php echo $total3;?> 每页<?php echo $per_page3; ?>条</h2>
		<p class="page"><?php  echo $page3; ?></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>