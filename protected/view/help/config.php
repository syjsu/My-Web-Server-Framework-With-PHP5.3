<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
 <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
 <link rel='stylesheet' type='text/css' media='all' href='/css/help.css' />
 <title>YunPHP 帮助文档---系统设计简介</title>
 </head> 
 <body>
 <div id="main" style="width:960px;margin:0px auto;">
 <div id="content">
 <h2>YunPHP是我在业余时间给sae开发的一个很简单的框架，希望大家多提建议</h2>
 <p>定制这个框架主要的设计思想和实现情况（有的不是很合理，值得讨论）：</p>
 <ul>
 	<li>基于主流的MVC框架</li>
 	<li>开发调试完全在sae运行环境下</li>
 	<li>模板其实我最初用的是smarty，把编译后的文件放在mc中，但是由于修改smarty源码几次都失败，发现这个东西太复杂，所以最后只用了原生态的php做模板</li>
 	<li>内核部分用mc缓存</li>
 	<li>实现了常见的activeRecord，方便数据库操作 </li>
 	<li>集成实现了sae特有的调试功能，XHPROF，只需打开开关，就可以查看每一步消耗的时间</li>
 	<li>由于sae不能写本地文件，所以所有的日志文件全部放在数据库中，需要新建一张表logs</li>
 	<li>url路由规则，只支持这种url格式的/user/info/15/ 或者/user_info_15/ /user-info-15/等类型的，具体的分隔符可以在config.php中设置</li>
 	<li>对url的高级路由，我没时间写，但是如果你要简单的缩短url，比如/user/info/15/ 你想弄成/user/15/ 你可以使用__call()函数，具体的看例子</li>
 	<li></li>
 	<li></li>
 	<li></li>
 	<li></li>
 </ul>
 </div>
 </div>
 </body>
 </html>
