<?php
	/*
	$route['work'] = 'blogs';
	$route['work/joe'] = 'blogs/user/hema';
	$route['work/(:any)] = "catalog/product_info/$1";
	$route['work/(:num)'] = "catalog/get_product_by_id/$1";
	$route['work/([a-z]+)/(\d+)'] = "$1/id_$2";
	*/

	$route['product'] = 'product/index';
	$route['product/info'] = 'product/infomation';
//	$route['product/:any'] = 'product/info';
// 	$route['product/(:any)'] = 'product/info/${1}';
//	$route['product/(:num)'] = 'product/info/${1}';
	$route['product/:num'] = 'product/info';
	$route['product/([a-z]+)/(\d+)'] = '${1}/id_${2}';
	
	$url = 'product/name/12';
	$url = 'product/1';
	$url = 'product';
//	echo preg_replace('#product/([a-z]+)/(\d+)#','${1}/id_${2}',$url);
	echo preg_replace('#product/[0-9]+#','product/info',$url);
	echo preg_replace('#^product$#','product/index',$url);
	exit();
	$temp = explode('/',$url);
	$class = $temp[0];
	foreach ($route as $key => $val){
		$key = str_replace(':any','.+',$key);
		$key = str_replace(':num','[0-9]+',$key);
		if(preg_match('#^'.$key.'$#',$url)){
			if(strpos($val,'$')!==FALSE){
				$val = preg_replace('#^'.$key.'$#', $val, $url);
				echo $val;exit();
			}
		}
	}

?>
