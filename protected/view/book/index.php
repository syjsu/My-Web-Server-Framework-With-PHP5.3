<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>图书ISBN搜索实例</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
		 <style type="text/css">
			.book_info{clear:both; width: 600px; min-width: 200px; border: 1px solid #ddd;}
			.book_title{background-color: #f7f7f7; height: 30px; line-height:30px;font-weight:bold; width: 600px; margin-bottom: 15px; margin-top: 20px;}
			.book_left{float: left; width: 150px; padding-left: 20px; }
			.book_right{float:left; width:400px; padding-left: 20px;}
			.book_intro{clear:both; width:600px; margin-top: 15px; line-height: 20px;}
		</style>
		 <script type="text/javascript" src="http://yunphp.sinaapp.com/js/jquery-1.3.2.min.js"></script> 
		<script language="javascript">
			function do_ajax(){
					$("#error_info").hide();
					var isbn = $("#isbn").val();
					$("#book_info").html("<img src='/images/loader.gif' />");
					dataType:'json', 
					$.ajax({
					   type: "POST",
					   url: "/book/getInfo",
					   data: "isbn="+isbn,
					   success: function(msg){
					   	 var obj = JSON.parse(msg);
					     $("#error_info").slideDown('slow');
					     $("#error_info").html(obj.info);
					     $("#book_info").html(obj.bookinfo);
					     if(obj.state == 'success'){
					     	$("#book_info").slideDown('slow');
					     }else{
					     	$("#book_info").hide('slow');
					     }
					   }
					});
				}
		</script>
	
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>图书ISBN信息搜索(目前js出问题了无法支持IE内核的东西)</h1>
			<p>你可以输入<kbd>ISBN</kbd>，程序会用SAE的<kbd>FetchUrl</kbd>取豆瓣的页面，然后正则匹配后展示出来</p>
			<p>数据缓存在<kbd>memcache</kbd>中一天，一天之后删除mc</p>
			<p><a href="/book/source" target="_blank">查看源码</a>&nbsp;&nbsp;<a href="http://book.douban.com/" target="_blank">从豆瓣上找isbn</a></p>
			<p id="error_info" style="display: none; height: 10px; line-height: 10px;" class="important"></p>
			<input type="text" name="isbn" size="50" id="isbn" />
			<input type="button" onclick="do_ajax()" value="请输入ISBN" />
	 		<div style='book_info' id="book_info">
	 		</div>
	 		
	 		<div>
	 			<h3>目前Mc系统中存在的isbn号码</h3>
	 			<?php foreach ($isbn_list as $key) { ?>

				<span style="float:left; margin-left:8px;"><?php echo $key; ?></span>
				
<?php } ?>
	 		</div>
			<div style="clear:both"></div>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>