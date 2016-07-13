<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
 <title>YunPHP 帮助HelloWorld的书写</title>
</head>
 <body>
 <div id="main">
<?php include_once(DIR_VIEW.'header.php'); ?>
 <div id="content">
	 <h1>HelloWorld 的书写<span>
	 <a href="/help/source" target="_blank">
	 <img  class="source" src="/images/php_source.jpg" />
	 </a></span></h1>
	 <h3>必要的准备</h3>
	 <ul>
		<li>有一个SAE的账号，呵呵</li>
		<li>找到配置文件的位置/protected/config/config.php</li>
		<li>看懂index.php</li>
		<li>由于日志文件是默认存放在数据库中，你需要新建一张logs的表(名字按照你的配置文件中的来设置)</li>
	 </ul>
	 <h3>第零步，处理SAE的urlrewrite</h3>
	 <p>在你的<kbd>config.yaml</kbd>中加上这句话</p>
	 <code>
		handle:<br/>
	 &nbsp;&nbsp; - rewrite: if(!is_dir() && !is_file()) goto "index.php/%{QUERY_STRING}"
	 </code>
	 <h3>第一步：打开index.php文件，修改调试状态</h3>
	 <code>
			define('DEBUG',<var>TRUE</var>);
	 </code>
	 <p>如果是TRUE是开发模式，会打印出SAE的错误和YunPHP的错误，FALSE为发布模式不会显示任何错误，需要程序员控制！</p>

	 <h3>第二步：在/protected/action/目录中创建HelloAction.class.php，其代码如下</h3>
	 <code>
	  &lt;?php <br />
	class HelloAction extends Action{<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;function __construct(){<br />
	&nbsp;&nbsp;&nbsp;&nbsp;
	parent::__construct();<br />
	&nbsp;&nbsp;&nbsp;&nbsp;
	}<br />
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;
	public function index(){<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<var>$welcome</var> = &quot;Hello welcome to YunPHP For SAE&quot;;<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	$this-&gt;assign('welcome',<var>$welcome</var>);<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;display('hello/index.php');<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	}	<br />
	}<br />
	?&gt;
	</code>
	<p>创建一个HelloAction.class.php，这里有一定的命名规范：</p>
	<ul>
	  <li>首字母必须大写</li>
	  <li>必须有Action来表示是控制器，同样，Model需要有Medel的后缀</li>
	  <li>在YunPHP中，凡是类的后缀都是<kbd>.class.php</kbd> 不是类的文件的后缀是<kbd>.php</kbd></li>
	</ul>

	 <h3>第三步：在/protected/view/中创建/hello/index.php的模板文件</h3>
	 <code>&lt;?php echo <var>$welcome;</var> ?&gt;</code>
	 <p>只需要在这里写出你刚才赋值的变量就行了。</p>
	 <p><kbd>对于是否有在SAE中使用Smarty等模板引擎的问题</kbd>，我以前尝试过修改Smarty的源码来解决这个问题，但是由于SAE不能写本地文件，只能将Smart的编译后的文件放在MC中，但是这里有个很大的问题是放进去之后模板更新问题（我后来因为这个问题放弃了），因为它不知道什么时候该更新编译后的内容，这导致你修改你的程序后，Smarty并不知道其编译后的文件的生成时间……这导致其不能自动重新编译……</p>
	 <p>其次目前SAE上跑的是不大的程序，用原生态的php做模板也可以接受，1.0.0版本只能做成这个样子了。</p>
</div>
 <?php require_once(DIR_VIEW.'footer.php');?>
 </div>
 </body>
 </html>
