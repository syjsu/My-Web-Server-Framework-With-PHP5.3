<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> 添加学生信息</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>用户信息查看</h1>
				<kbd>姓名：</kbd><?php echo $info['name']; ?><br/>
				<kbd>密码：</kbd><?php echo $info['psw']; ?><br/>
				<kbd>学校：</kbd><?php echo $info['school'];?><br/>
	 <h2>控制器StuAction.class.php 中 使用__call()函数</h2>
	 <p><code> public function __call($id,$arguments){<br />
	   &nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;model('stu'); <br />
&nbsp;&nbsp;&nbsp;&nbsp;
if(is_numeric($id)){<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$stu = new StuModel();<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$res = $stu-&gt;getStuInfo($id);<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('info',$res);<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;display('stu/info.php');<br />
&nbsp;&nbsp;&nbsp;&nbsp;
}	<br />
}</code></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>
