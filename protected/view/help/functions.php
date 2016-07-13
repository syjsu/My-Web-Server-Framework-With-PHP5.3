<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>XHprof详解----YunPHP帮助文档</title>
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
			<h1>YunPHP常用函数
			<span><a href="/help/source" target="_blank">
	 		<img  class="source" src="/images/php_source.jpg" />
	 		</a></span>
			</h1>
			<p>其实这边也没有什么特别的函数，也就是一些加载类库的函数，最后我都把他们弄到YunPHP.class.php中去了，因为只有Action和Model使用他们。继承了，好使用（如果感觉这样不好，可以告诉我一下，我修改）。</p>
			<h3>加载常用类库</h3>
			<p>加载系统类库是指加载/YunPHP/lib /protected/lib/中的类库 函数为</p>
			<p><code>import_class($class) </code></p>
			<p><kbd>需要注意的是，YunPHP中所有加载都需要重新实例化 $class = new CLASS();本人不习惯IDE没有提示的情况，所以重新实例化一遍 </kbd></p>
			<h3>加载三方类库，load_helper(); 可以是一个类也可以是一个函数文件</h3>
			<code>$this-&gt;load_helper($class);</code>
			<p></p>
<h3>加载数据库的问题(Db.class.php是我做了一些简单的增删改查的处理的一个类，方便基本的单表操作）</h3>
<p><code>$this-&gt;load_class(‘Db’);<br/>
$db = new Db(); <br/>
$info = $db->getById('stu',$id);</p>
<p>关于数据库是否需要实现<kbd>单例模式</kbd>的问题，我想了很久，看个人喜好，我真的感觉不出来有什么好处……因为对php来说，一般在model里面也只是初始化的时候就会初始化一个实例。值得讨论。<br/>
</p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>