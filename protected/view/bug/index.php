<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Bug类表--YunPHP</title>
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
			<h1>Bug列表</h1>
			<p>第一次写框架，研究的时间有限，所以bug也会很多，我会尽量多用这个框架写一些应用并测试，如果有测试到bug的请告知我，谢谢。</p>
			<p><kbd>其次就是尽量用系统默认的配置参数</kbd>，有的参数的改变我还不能确定其是否会引起系统的未知错误！</p>
			<h2>已经发现的Bug</h2>
	 			<ul>
	 			  <li>在模板中include的问题，比如不能include('/index/header/'),只能去包含include(DIR_VIEW'/index/index.php'),这个问题先这么解决下，求高人来处理</li>
	 			  <li>关于YunPHP只能把日志写到mysql中，目前还在等待官方出一个打日志的API来解决这个问题，经过测试，sae_debug($msg)会中断程序，不符合要求。</li>
	 			  <li>没有判断Controller不存在的情况——已经在1.0.2中解决</li>
	 			  <li>Controller中方法没有这个方法的时候没有判断——在1.0.2中增加对Action.class.php中的__call函数的处理，默认抛出404错误</li>
	 			</ul>
	 		<h2>版本修改历史</h2>
	 		<h3>1.0.2修改时间2010年5月30日</h3>
	 		<ul>
	 			<li>修改了判断是否存在这个Action的错误（以前没有判断）</li>
	 			<li>增加了404的错误显示（但是没有头输出，传说对seo不好）</li>
	 			<li>增加了对Action控制器中方法不存在的控制，如果不存在，将抛出404错误</li>
	 			<li>在Action中增加了两个正确和错误显示的非ajax快捷方法$this->success($msg);$this->error($msg);</li>
	 			<li>增加了全站的源码查看模块</li>
	 			<li>提供了两种日志格式，一种是sae的官方的日志文件系统，一种是基于mysql的日志处理。</li>
	 		</ul>
	 		
	 		<h3>1.0.1已经修改 2010年5月9日</h3>
	 		<ul>
	 			<li>修改Medel.class.php中对memcache的封装（主要是考虑到效率的问题），请使用原生态的SAE提提供的memcache操作方法来操作MC</li>
	 			<li>重新修改了一下分页函数，使其能够支持中文的url地址</li>
	 			<li>添加一个SAE中级学习的例子--图书ISBN信息搜索实例</li>
	 		</ul>
	 		<h3>1.0.0 发布时间2010年5月4日</h3>
	 		<ul>
  				<li>完成了YunPHP基本的编码，做了一些小的测试</li>
  				<li>使用YunPHP写完官网，以及一个“学生管理系统”的小的例子来完成数据库的增、删、改、查等操作</li>
			</ul>

	 		<h2>提交bug</h2>
	 		<p>发现bug，请大家加我的微薄给我留言<a href="http://t.sina.com.cn/bnuheyue" target="_blank">@河马微博</a></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>