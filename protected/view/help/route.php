<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>非常优美和自由的URL----YunPHP帮助文档</title>
		 <link rel='stylesheet' type='text/css' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>YunPHP路由--非常优美的URL
			<span><a href="/help/source" target="_blank">
			 <img  class="source" src="/images/php_source.jpg" />
			 </a></span>
			</h1>
			<p>想必很多同学没有入驻SAE的原因是因为SAE的urlrewrite不知道怎么用，这里我给大家揭秘一下。</p>
			<ul>
				<li>YunPHP的首页默认的url是<var>/index/index/</var> 其他的默认的也是路由到其下面的index函数，如访问<var>/stu</var> 的时候会被路由到<var>/stu/index</var>(当然这些默认的在<var>/protected/config/config.php</var>中都可以修改)</li>
				<li>你可以修改分隔符为'-','_'等符号，让url变成<var>/stu-info-1-32 /stu_infomation_2 </var>等样子，但是这样就要<kbd>保证你的控制器的函数不能有分隔符</kbd>。</li>
				<li>参数问题:<var>/stu/info</var> 表示访问到<var>StuAction.class.php</var> 中的<var>StuAction </var>类的 <var>info</var>方法 。<var>/stu/info/2</var> 后面的2就是参数，分页的时候分页函数会把页码加在最后。函数中通过<var>public function info($id)</var> 获得地址栏的id值</li>
				<li>关于怎么把框架里面的index.php去掉的问题，我想我在helloworld中写过，拷贝一遍,编辑你的SAE配置文件</li>
			</ul>
			<code>
				handle:<br/>
			 &nbsp;&nbsp; - rewrite: if(!is_dir() && !is_file()) goto "index.php/%{QUERY_STRING}"
	    </code>
			<h2>一般路由功能</h2>
			<ul>
			<li><a  href="/stu/stulist">获得学生列表(函数名区分大小写):/stu/stulist/</a></li>
			<li><a href="/stu/info/1">获取id为1的学生的信息:/stu/info/1</a></li>
			<li><a href="/stu/1">用__call方法缩短url(同上):/stu/1</a></li>
			</ul>
			
			<h2>高级路由功能---&gt; <a href="/help/route">查看使用方法</a> </h2>
			<ul>
				<li><a href="/student/">访问student其真实地址为/stu/index</a></li>
				<li><a href="/student/1">访问/student/(:num) 会被路由到 /stu/info/id</a></li>
            </ul>
			<p><kbd>第一步：修改/protected/config/route.php</kbd>，要保证不要和其他的url冲突（很重要）。</p>
			<p><code> $config['student'] = 'stu/index'; <br />
$config['student/(:num)'] = 'stu/info/${1}';<br />
			</code></p>
			<p><code>//	$config['product'] = 'product/index'; <br />
			  //	$config['product/info'] = 'product/infomation';<br />
			  //	$config['product/:any'] = 'product/info';&nbsp; //表示所有procuct下的访问全路由到info中 <br />
			  //	$config['product/(:any)'] = 'product/info/${1}'; //所有参数转移到/product/info/参数中 <br />
			  //	$config['product/:num'] = 'product/info';<br />
			  //	$config['product/(:num)'] = 'product/info/${1}';<br />
		    //	$config['product/([a-z]+)/(\d+)'] = '${1}/id_${2}';//正则处理 product/hema/2 路由到hema/id_2上
			</code> </p>
			<p><kbd>第二步:在保证没有链接冲突的情况下，启用新的url</kbd></p>
			<h2>基本的增删改查(以及session的处理)</h2>
			<ul>
				<li><a href="/stu/reg">添加注册</a></li>
				<li><a href="/stu/login">登陆</a></li>
				<li><a href="/stu/stulist">信息列表</a></li>
				<li><a href="/stu/page">分页显示</a></li>
		    </ul>
	        <p>关于session的处理，这里列举一个例子，比如全站都可以游客访问，但是/stu/下面的方法都需要登录，只需要在其控制器StuAction.class.php中添加一个控制和跳转就行了。</p>
	        <p><code> public function __construct(){<br />
	          &nbsp;&nbsp;&nbsp;&nbsp;
session_start();
<br />
&nbsp;&nbsp;&nbsp;&nbsp;
parent::__construct();<br />
		&nbsp;&nbsp;&nbsp;&nbsp;	if($_SESSION['name'] == ''){<br />
				 &nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;login(); //转到登录函数处理 <br />
		&nbsp;	}<br />
}</code></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>