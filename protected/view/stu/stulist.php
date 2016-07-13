<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>学生信息列表----YunPHP例子</title>
		 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
	</head>
	<body>
	<div id="main">
	<?php require_once DIR_VIEW.'header.php';?>
	  <div id="content">
			<h1>YunPHP学生管理的例子，学生列表</h1>
				<table>
					<tr><td>id</td><td>姓名</td><td>密码</td><td>学校</td><td>操作</td></tr>
					<?php foreach ($stulist as $stu){ ?>
						<tr>
						<td><?php echo $stu['id'] ?></td>
						<td><?php echo $stu['name'] ?></td>
						<td><?php echo $stu['psw'] ?></td>
						<td><?php echo $stu['school'] ?></td>
						<td><a href="/stu/edit/<?php echo $stu['id']; ?>" >编辑</a> 
						<a href="/stu/info/<?php echo $stu['id']; ?>">查看</a></td>
						</tr>
					<?php } ?>
				</table>
				<div><?php echo $page ?></div>
				<p><a href="/page" target="_blank">分页方法请查看</a></p>
			<h2>Model写法</h2>
			<p><code> public function getStuList(){<br>
  &nbsp;&nbsp;&nbsp;&nbsp;
		    $this-&gt;<var>load_class</var>('Db');<br>
  &nbsp;&nbsp;&nbsp;&nbsp;
		    $db = new Db();<br>
  &nbsp;&nbsp;&nbsp;&nbsp;
		    $sql = 'select * from stu';<br>
  &nbsp;&nbsp;&nbsp;&nbsp;
		    $res = $db-&gt;<var>get_data</var>($sql);<br>
  &nbsp;&nbsp;&nbsp;&nbsp;
		    return $res;<br>
		    }</code>	    </p>
			<h2>控制器Action写法</h2>
			<p><code> public function stulist(){<br>
			  &nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;<var>model</var>('stu');<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$stu = new StuModel();<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$res = $stu-&gt;<var>getStuList</var>();<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('stulist',$res);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;display('stu/stulist.php');<br>
} </code></p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>