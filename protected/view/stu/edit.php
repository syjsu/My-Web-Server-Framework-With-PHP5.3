<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> 编辑学生信息</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
		<h1>编辑学生信息</h1>
		<form action="/stu/edit/<?php echo $res['id'] ?>" method="post">
			姓名：<input type="text" name="name" value="<?php echo $res['name']?>" /><br/><br/>
			密码：<input type="text" name="psw" value="<?php echo $res['psw']?>"/><br/><br/>
			学校：<input type="text" name="school"  value="<?php echo $res['school']?>"/><br/><br/>
		<input type="submit" value="提交" />
		</form>
	    <h2>控制器StuAction.class.php的写法</h2>
	    <p>这里没有做什么验证，只是实现一个功能而已！</p>
	    <p><code> public function edit($id){<br />
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$stu  = new StuModel();<br />
	      &nbsp;&nbsp;&nbsp;&nbsp;
if($_POST){<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;
$res = $stu-&gt;stuSave($_POST,$id);<br />
&nbsp;&nbsp;&nbsp;&nbsp;
if($res){<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
echo 'update success!';<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{	<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
echo 'update fail';<br />
&nbsp;&nbsp;&nbsp;&nbsp;
}	<br />
&nbsp;}<br />
&nbsp;&nbsp;&nbsp;&nbsp;
$res = $stu-&gt;getStuInfo($id);<br />
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('res',$res);<br />
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;display('stu/edit.php');<br />
}</code></p>
	    <h2>StuModel.class.php 的写法 </h2>
	    <p><code> public function getStuInfo($id){<br />
	      &nbsp;&nbsp;&nbsp;&nbsp;
$info = $this-&gt;db-&gt;getById('stu',$id);<br />
&nbsp;&nbsp;&nbsp;&nbsp;
return $info;<br />
}<br />
<br />
public function stuSave($data,$id){<br />
&nbsp;&nbsp;&nbsp;&nbsp;
return $this-&gt;db-&gt;updateData($this-&gt;table,$data,&quot;id = $id&quot;);<br />
}</code></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>