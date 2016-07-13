<html>
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
			<h1>日志处理</h1>
			<p><a href="/log/show" target="_blank">查看日志</a></p>
			<h2>日志的说明</h2>
	 			<ul>
	 			  <li>由于SAE的特殊原因（无法写本地文件），所以日志文件会放在mysql中。</li>
	 			  <li>如果你启用日志功能，请在数据库表中创建一个表，默认是logs（可以在config/config.php中修改）</li>
	 			  <li> $config['log_place'] = '<kbd>mysql</kbd>'; 到目前为止，只能设置在mysql中</li>
				  <li>$config['log_table'] = '<kbd>logs</kbd>'; 数据库中的表</li>
	 			  <li> $config['log_write_level'] = '1'; 日志的等级，目前只打了ERROR的日志 </li>
	 			  <li><kbd>对于日志的处理，我有很多地方没有设计好，不知道在哪里该打日志</kbd>，YunPHP自身打的日志主要在mysql错误的地方，后续的版本我将仔细处理一下日志的问题。您的应用的日志自己处理……</li>
	 			</ul>
	 		<h2>日志设置</h2>
	 		<code>CREATE TABLE IF NOT EXISTS `logs` (<br>
`id` int(11) NOT NULL auto_increment,<br>
`level` varchar(20) NOT NULL,<br>
`log_time` datetime NOT NULL,<br>
`msg` varchar(200) NOT NULL,<br>
PRIMARY KEY  (`id`)<br>
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;<br>
	 		</code>
	 		<h2>日志函数说明</h2>
	 		<p>日志函数本来计划打很多的，但是由于中间发现性能影响太大(每次都要进行数据库的连接之类的操作)，所以删除了一些打日志的地方，但是在<kbd>DEBUG</kbd>的模式下还是可以很多日志。</p>
	 		<p>你可以在任何地方调用</p>
	 		<p><kbd>Log::write_log($level='ERROR',$message) </kbd>来调用打日志的函数</p>
	 		<p><kbd> Log::show_log()</kbd>查看所有日志 </p>
	  </div>
	  <?php require_once DIR_VIEW.'footer.php'; ?>
		</div>
	</body>
</html>