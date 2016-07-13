<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>XHprof详解----YunPHP帮助文档</title>
		 <link rel='stylesheet' type='text/css' href="/css/help.css" />
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
			<h1>XHProf使用详解，SAE平台
				<span><a href="/help/source" target="_blank">
	 			<img  class="source" src="/images/php_source.jpg" />
	 			</a></span>
			</h1>
			<p>facebook出的一个php的调试工具,特别牛逼，可以取代xdebug来调试程序的效率，facebook果然威武.</p>
			<p>YunPHP支持SAE平台下的XHProf调试，你可以简单的设置一下就可以查看XHProf的调试结果</p>
			<h3>第一步，在你的Storage中建立一个xhprof的域</h3>
			<h3>第二步, 打开index.php，修改设置</h3>
			<code> define('XHPROF',<var>FALSE</var>); //如果是FALSE表示不产生，是TRUE表示产生 <br>
			  &nbsp;&nbsp;&nbsp;&nbsp;if(XHPROF){<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<kbd>sae_xhprof_start()</kbd>;<br>
&nbsp;&nbsp;
}</code>
 
<h3>第三步：你没有看错，这样就行了，登陆你的SAE就可以查看了</h3>
<p><img src="/images/xhprof.jpg" width="690" height="469"></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>