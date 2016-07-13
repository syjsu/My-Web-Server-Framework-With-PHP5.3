<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>异常处理Exceptions----YunPHP帮助文档</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>异常处理
			<span><a href="/help/source" target="_blank">
	 <img  class="source" src="/images/php_source.jpg" />
	 </a></span>
			</h1>
			<p>这部分的处理主要是为开发者和用户面对错误的时候的处理方法。在DEBUG的时候出现的是系统错误调试信息，在发布之后，用户不能看见这些错误信息，只给他们提示网站出现错误的信息。</p>
			<h2>错误处理的文件和方法</h2>
			<ul>
				<li>/protected/errors/debug_error.php 给开发人员看的error模板 </li>
				<li>/protected/errors/show_error.php 给用户看的模板 </li>
		        <li>调用exception的方法 在任何地方<kbd> throw new Exception(&quot;Error&nbsp; Some thing is Error now !&quot;)</kbd>; </li>
		    </ul>
			<h2>出现错误的显示</h2>
			<p><kbd>DEBUG的时候，调用/debug_error.php 模板</kbd></p>
			<p><img src="/images/exceptions_debug.JPG" width="900"></p>
			<p><kbd>上线的时候,调用show_error.php 模板</kbd></p>
			<p><img src="/images/exceptions_show.JPG" width="650"></p>
			<h3>Exception 的函数的写法，为了让您明白什么时候该用这个 </h3>
			<code>function my_exception_handler(<var>$e</var>){<br>
			  &nbsp;&nbsp;&nbsp;&nbsp;
if (DEBUG == TRUE) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$file = $e-&gt;getFile();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$line = $e-&gt;getLine();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$message = &quot;&lt;b&gt;YunPHP error:   &lt;/b&gt;&quot;.$e-&gt;getMessage();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<kbd>Log::write_log</kbd>('ERROR',&quot;$message  $file $line &quot;);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ob_start();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
include_once <var>DOCROOT</var>.'errors/debug_error.php';<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$buffer = ob_get_contents();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ob_end_clean();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
echo $buffer;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Log::write_log('ERROR',&quot;$message  $file $line &quot;);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ob_start();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
include_once DOCROOT.'errors/show_error.php';<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$buffer = ob_get_contents();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ob_end_clean();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
echo $buffer;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
}&nbsp;&nbsp;&nbsp;	<br>
}</code>
			<h2>如果有其他的需求，比如404，500之类的错误，请使用SAE的错误定义方法</h2>
            <p>&nbsp;</p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>