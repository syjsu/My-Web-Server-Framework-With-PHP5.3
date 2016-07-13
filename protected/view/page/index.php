<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>YunPHP的分页函数，修改自codeIgniter</title>
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
			<h1>各种分页</h1>
			<p>先说下这个分页函数是根据<kbd>CodeIgniter</kbd>的重写而来，尊重其版权，在用到它的东西的时候都说一下。</p>
			<p>传给分页函数当前的url，总数和当前页数，以及必要的css给分页函数，分页函数返回一个页码的html</p>
			<h2>第一种--------总数<?php echo $total1;?> 每页<?php echo $per_page1; ?>条</h2>
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
		  <p style="background: #f7f7f7"><?php  echo $page1; ?></p>
			<code>
			 &nbsp;&nbsp;&nbsp;&nbsp;	$this-&gt;load_helper('<kbd>Page</kbd>'); //加载Page的三方库<br>
			  &nbsp;&nbsp;&nbsp;&nbsp;	$config1['<var>base_url</var>'] = '<kbd>/page/index/</kbd>'; //当前的url，如果有参数需要拼接一下url<br>
&nbsp;&nbsp;&nbsp;&nbsp;	$config1['<var>total_rows</var>'] = <kdb>$count</kbd>; //传递总数<br>
&nbsp;&nbsp;&nbsp;&nbsp;	$config1['<var>per_page</var>'] = <kdb>$per_page</kbd>; //传递每页的数量 <br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config1['<var>cur_page</var>'] = <kdb>$cur_page</kbd>; //传递当前页码<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<var>$pageStr1</var> = new Page(<kdb>$config1</kdb>); <br>
&nbsp;&nbsp;&nbsp;&nbsp;
<var>$page1</var> = $pageStr1-&gt;create_links(); //创建新页码<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('<var>total1</var>',<kbd>$config1['total_rows']</kbd>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('<var>per_page1</var>',<kbd>$config1['per_page']</kbd>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('<var>page1</var>',<kbd>$page1</kbd>);</code>
	 
			<h2>第二种--------总数<?php echo $total3;?> 每页<?php echo $per_page3; ?>条</h2>
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
		  <p class="page"><?php  echo $page3; ?></p>
			<code> &nbsp;&nbsp;&nbsp;&nbsp;	$config3['base_url'] = '/page/index/';<br>
			  &nbsp;&nbsp;&nbsp;&nbsp;
$config3['total_rows'] = $count;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['per_page'] = $per_page;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['cur_page'] = $cur_page;<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['page_tab_open']=$config3['prev_tag_open']=$config3['next_tag_open']=$config3['last_tag_open']= $config3['first_tag_open'] = <kbd>&quot;&lt;span&nbsp;&nbsp;&nbsp; class='page_style'&gt;&quot;</kbd>;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['page_tab_close']=$config3['prev_tag_close']=$config3['next_tag_close']=$config3['last_tag_close']= $config3['first_tag_close'] = <kbd>&quot;&lt;/span&gt;&quot;</kbd>;<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['cur_tag_open'] = <kbd>&quot;&lt;span class='page_cur'&gt;&quot;</kbd>;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['cur_tag_close'] = <kbd>&quot;&lt;/span&gt;&quot;</kbd>;<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['num_tag_open'] = '共&lt;b&gt;';<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$config3['num_tag_close'] = '&lt;/b&gt;条符合条件的记录';<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$pageStr3 = new Page($config3);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$page3 = $pageStr3-&gt;create_links();<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('total3',$config3['total_rows']);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('per_page3',$config3['per_page']);<br>
&nbsp;&nbsp;&nbsp;&nbsp;
$this-&gt;assign('page3',$page3);</code>
<h2>分页函数解释</h2>
<p>这些是外界调用的时候需要传入的参数，当然你可以根据你的项目直接给它一个初始值或者写个继承的类</p>
<code>
&nbsp;&nbsp; var $base_url			= ''; // 最基础的url，分页函数在最后加上页码<br>
&nbsp;&nbsp;&nbsp;var $total_rows  		= ''; // 总数<br>
&nbsp;&nbsp;&nbsp;var $per_page	 		= 10; // 每页显示的数量<br>
&nbsp;&nbsp;
var $num_links			=  2; // 显示在当前页左右的有几个，比如例子中就是2个<br>
&nbsp;&nbsp;&nbsp;var $cur_page	 		=  1; // 默认当前页<br>
<br>
&nbsp;&nbsp;
var $first_link   		= '&amp;lsaquo;&amp;lsaquo; First';  //第一页的文字<br>
&nbsp;&nbsp;
var $next_link			= '&amp;gt;';	//下一页的文字<br>
&nbsp;&nbsp;
var $prev_link			= '&amp;lt;'; 	//上一页的文字<br>
&nbsp;&nbsp;
var $last_link			= 'Last &amp;rsaquo;&amp;rsaquo;'; //最后一页的文字<br>
<br>
&nbsp;&nbsp;
var $full_tag_open		= '';  //如果你想在page外面包一层div，css的标签请用这个<br>
&nbsp;&nbsp;
var $full_tag_close		= '';  //后标签<br>
<br>
&nbsp;&nbsp;
var $first_tag_open		= '';  //第一页的左边的div css 标签<br>
&nbsp;&nbsp;
var $first_tag_close	= '&amp;nbsp;'; //第一页右边的div css 标签，下面同<br>
<br>
&nbsp;&nbsp;
var $last_tag_open		= '&amp;nbsp;'; //最后一页<br>
&nbsp;&nbsp;
var $last_tag_close		= '';<br>
<br>
&nbsp;&nbsp;
var $cur_tag_open		= '&amp;nbsp;&lt;strong&gt;'; //当前页<br>
&nbsp;&nbsp;
var $cur_tag_close		= '&lt;/strong&gt;';<br>
<br>
&nbsp;&nbsp;
var $next_tag_open		= '&amp;nbsp;'; //下一页<br>
&nbsp;&nbsp;
var $next_tag_close		= '&amp;nbsp;';<br>
&nbsp;&nbsp;
var $prev_tag_open		= '&amp;nbsp;';<br>
&nbsp;&nbsp;
var $prev_tag_close		= '';<br>
<br>
&nbsp;&nbsp;
var $num_tag_open		= '&amp;nbsp;'; //总数<br>
&nbsp;&nbsp;
var $num_tag_close		= '';<br>
<br>
&nbsp;&nbsp;
var $page_tab_open      = '&amp;nbsp;'; //其他不是当前页的页码的div css<br>
&nbsp;&nbsp;
var $page_tab_close 	= '';<br>
<br>
&nbsp;&nbsp;
var $uri_segmentation = ''; //从配置文件中读取分隔符。本分页函数将在url最后加上页码<br>
&nbsp;&nbsp;
var $page_uri = ''; //标准生成的uri</code>
<code>
	
</code>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>