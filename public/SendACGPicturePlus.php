<?php

/**
 *
在SAE环境的config.yaml文件后面加这一段 表示每天00：05分执行SendACGMailPlus.php这个文件

 cron:
- description: cron_test
  url: SendACGMailPlus.php
  schedule: "5 8 * * *"
 */

//设置邮件标题
$weekarray=array("日","一","二","三","四","五","六");
$title = "老司机ACG收藏-".date("Y年m月d日h时i分")."星期".$weekarray[date("w")];

//设置邮件内容
$context = "";

//添加SCS的依赖
if (!class_exists('SCS')) require_once 'SCS.php';
date_default_timezone_set('UTC');

// 设置SCS的信息
if (!defined('AccessKey')) define('AccessKey', 'tq9s6rR9hv9WM40CCzK7');
if (!defined('SecretKey')) define('SecretKey', '1b76fb0be21374171ddff3236741cd19ccb37ac5');

//爬虫爬接口
$url = file_get_contents("http://acgstay.mavericks.lol:8888/today?mode=3");
$res = json_decode($url,JSON_UNESCAPED_UNICODE);

//遍历返回值
foreach ($res['info'] as $go) {
	//上传到云存储
	//UploadToSCS($go['id'],$go['url']);
	//整合成html
	$pic1 = '<p>标签:'.$go['tags'].'</p>';
	$pic2 = '<img src="'.$go['url'].'" width="'.$go['width'].'" height="'.$go['height'].'"> </img>';
	$pic3 = '<p></p>';
	$context = $context.$pic1.$pic2.$pic3;
}

//爬虫爬接口
$url = file_get_contents("http://cosplay.mavericks.lol:8887/today?mode=3");
$res = json_decode($url,JSON_UNESCAPED_UNICODE);

//遍历返回值
foreach ($res['info'] as $go) {
	//上传到云存储
	//UploadToSCS($go['id'],$go['url']);
	//整合成html
	$pic1 = '<p>标签:'.$go['tags'].'</p>';
	$pic2 = '<img src="'.$go['url'].'" width="'.$go['width'].'" height="'.$go['height'].'"> </img>';
	$pic3 = '<p></p>';
	$context = $context.$pic1.$pic2.$pic3;
}

//合并成邮件正文
$header = '<head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>'.$title.'</title></head><body>';
$footer = '</body></html>';
$content_all = $header.$context.$footer;

echo $content_all;

$MailTo[]= "syjsu@qq.com";
$MailTo[]= "931713439@qq.com";
$MailTo[]= "251209330@qq.com";
$MailTo[]= "qyvlik@qq.com";
$MailTo[]= "cnzxzc@vip.qq.com";
$MailTo[]= "496734698@qq.com";

foreach ($MailTo as $key => $value) {
	echo "发送邮件给".$value;
	SendMail($value,$content_all,$title);
}


//发送邮件的函数
function SendMail($MailAddress,$content_all,$title){
	$mail = new SaeMail();
	$mail->setOpt(array(
		'smtp_host' =>'smtp.sina.com',
		'smtp_port' => 25,
		'content_type' =>HTML,
		'smtp_username' =>'syjsu@sina.com',
		'smtp_password' =>'qq8522329',
		'from' =>'syjsu@sina.com',
		'nickname' =>'小小酥XXS',
		'to' =>$MailAddress,
		'subject' =>$title,
		'content' =>$content_all
	));
	$ret = $mail->send();
	if ($ret === false){
		var_dump(
			$mail->errno(),
			$mail->errmsg()
		);
	}else{
		echo "发送成功";
	}
	$mail->clean(); // 重用此对象
}

//上传到SCS的函数
function UploadToSCS($uploadName,$file){
	//新建SCS的信息
	$scs = new SCS(AccessKey, SecretKey);
	//设置上传的文件夹
	$bucketName = "acg-stay";
	//获取地址后缀名
	$array = explode('.',$file);
        	$_end =end($array);
        	//设置上传的文件名
        	$uploadName = $uploadName.'.'.$_end;
	//文件地址
	$uploadFile = file_get_contents($file);
	//上传文件
	$ref =$scs->putObject($uploadFile, $bucketName, $uploadName, SCS::ACL_PUBLIC_READ);
	//判断结果
	if ($ref) {
		echo $uploadName."上传完成\n";
	}else{
		echo $uploadName."上传失败\n";
	}
}

?>