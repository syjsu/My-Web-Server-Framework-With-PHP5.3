<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>系统定义变量和编码规范----YunPHP帮助文档</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>YunPHP系统定义变量，编码规范
			<span><a href="/help/source" target="_blank">
	 		<img  class="source" src="/images/php_source.jpg" />
			 </a></span>
			</h1>
			<p>这个框架一定程度上限制了一些php自由开发，但是一定的编码规则可以比较好的团队协作</p>
			<h2>系统定义变量</h2>
			<ul>
				<li><kbd>DOCROOT</kbd> 应用的根目录</li>
				<li><kbd>YUNPHP</kbd> 框架的系统文件的目录</li>
				<li><kbd>DIR_VIEW</kbd> 模板的目录</li>
				<li><kbd>DIR_ACTION</kbd> 控制器的目录</li>
				<li><kbd>DIR_MODEL</kbd>  模型的目录</li>
				<li><kbd>RUNTIME</kbd> saemc:/   但是没有用上</li>
			</ul>
			<h2>YunPHP的编码规范</h3>
			<ul>
				<li>所有类的后缀<var>.class.php</var>所有非类的php文件的后缀<var>.php</var></li>
				<li>类名首字母大写</li>
				<li>控制器和model的文件名必须是这样的命名才行StuAction.class.php StuModel.class.php</li>
				<li>函数名不能和url的分隔符冲突，比如你的地址栏用的是'_'做分隔符<var>(stu_info_1)</var>，那你的<kbd>控制器</kbd>中函数就不能使用下划线。</li>
			</ul>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>