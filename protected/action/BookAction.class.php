<?php
	class BookAction extends Action {

		/**
		 * 构造函数
		 */
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$mmc = memcache_init();
			if($mmc == false){
				throw new Exception('Memcache Error =>memcache init error! ');
			}
			$isbn_list = unserialize(memcache_get($mmc,'isbn_list'));
			$this->assign('isbn_list',$isbn_list);
			$this->display('book/index.php');
		}

		public function booklist(){
			$mmc = memcache_init();
			if($mmc == false){
				throw new Exception('Memcache Error =>memcache init error! ');
			}
			$isbn_list = unserialize(memcache_get($mmc,'isbn_list'));
			$this->assign('isbn_list',$isbn_list);
			$this->display('book/booklist.php');
		}
		/**
		 * 查看BookAction.class.php的源码
		 *
		 */
		public function source(){
			echo highlight_file(DIR_ACTION.'BookAction.class.php');
		}
		/**
		 * 从豆瓣取页面，然后解析页面，最后存入mc中
		 *
		 * @param unknown_type $isbn
		 */
		public function getInfo($isbn = ''){
			if($_POST['isbn']){
				$isbn = trim($_POST['isbn']);
			}else if ($_GET['isbn']){
				$isbn = trim($_GET['isbn']);
			}
			//Isbn的格式不是很清楚，暂时定为10-13位
			if(!preg_match('/^([0-9]{10,13})$/',$isbn)){
				$data['state'] = 'fail';
				$data['info'] = 'isbn 不合法';
				echo json_encode($data);
				return ;
			}

			$data = array();
			$data['state'] = 'fail';
			$data['info'] = 'fail to get the book info!';
			$data['bookinfo'] = '';

			function createHtml($info){
			$html = "<div class='book_title'>$info[name]</div>
	 			<div class='book_left'><img src='$info[pic]' /></div>
	 			<div class='book_right'>
	 				<ul>
	 					<li>作者：$info[writer]</li>
	 					<li>isbn: $info[isbn]</li>
	 					<li>翻译 :$info[trans]</li>
	 					<li>页数:$info[page]</li>
						<li>价格:$info[price]</li>
						<li>出版社:$info[publisher]</li>
	 					</ul>
	 			</div>
	 			<div class='book_intro'>$info[intro]</div>";
	 			return $html;
			}
			$mmc = memcache_init();
			if($mmc == false){
				throw new Exception("Memcache error ==> init memcache error");
			}
			if($temp = memcache_get($mmc,$isbn)){
				$data['state'] = 'success';
				$data['info'] = '从memcache缓存中获取数据成功！';
				$mc_book_info = unserialize($temp);
	 			$data['bookinfo'] = createHtml($mc_book_info);
				echo json_encode($data);
				exit();
			}

			$name = '';
			$pic = '';
			$writer = '';
			$trans = '';
			$page = '';
			$price = '';
			$year = '';
			$publisher = '';
			$info = '';

			//开始获取页面
			$f = new SaeFetchurl();
			$f -> setAllowRedirect(2);
			//douban
			$doubanUrl = "http://book.douban.com/isbn/$isbn/";
			//google
			$url = "http://books.google.cn/books?q=9787302108535";

			$doubanContent = $f->fetch($doubanUrl);

			//书名 作者名 信息 简介的正则匹配
			$namePatten = '/<h1>([^<>]*)<\/h1>/';
			$writerPatten = '/<span\sclass=\"pl\">([^<>]*)<\/span>:\s<a href=\"([^<>]*)\">([^<>]*)<\/a><\/span>/';
			$infoPatten = '/<span\sclass=\"pl\">([^<>]*)<\/span>([^<>]*)<br\/>/';
			//豆瓣的intro有两种样子，一种是隐藏一部分
			$introPatten = '/<span\sclass=\"short\">([^<>]*)<br\/>/';
			$introPatten1 = '/<div class=\"indent\"> (.*)<br\/>/';
			$picPatten = '/<div\sid=\"mainpic\"><a\shref=\"([^"]*)\"/';

			preg_match_all($namePatten,$doubanContent,$nameResult);
			preg_match_all($writerPatten,$doubanContent,$writerResult);
			preg_match_all($infoPatten,$doubanContent,$infoResult);
			preg_match_all($introPatten,$doubanContent,$introResult);
			preg_match_all($picPatten,$doubanContent,$picResult);

			$doubanContent = NULL;

			array_shift($infoResult);
			$infoCount = count($infoResult[0]);
			//把那几个东西对应起来，不然下面的复制的时候不知道用哪一个~
			for($i=0;$i<=$infoCount-1;$i++){
				$key = $infoResult[0][$i];
				$value = $infoResult[1][$i];
				$infoTemp[$key] = $value;
			}

			$doubanPic = $picResult[1][0];

			$name = $nameResult[1][0];
			$writer = $writerResult[3][0];
			$trans = $writerResult[3][1];
			$pic = $doubanPic;
			$page = $infoTemp['页数:'];
			$price = $infoTemp['定价:'];
			$year = $infoTemp['出版年:'];
			$publisher = $infoTemp['出版社:'];
			$intro = $introResult[1][0];

			if($intro == ''){
				$introResult = array();
				preg_match_all($introPatten1,$doubanContent,$introResult1);
//				var_dump($introResult1);
				$intro = $introResult1[1][0];
			}
		//	echo $name."<br>".$writer."<br/>".$trans."<br/>".$pic."<br/>".$page."<br/>".$price."<br/>".$year."<br/>".$publisher."<br/>".$info."<br/>";
			 //生成图片
			 $f1 = new SaeFetchurl();
			 $img_data = $f1->fetch($doubanPic);
			 $img = new SaeImage();
			 $img->setData($img_data);
			 $img->resize(130); // 等比缩放到130宽
			 $new_data = $img->exec(); // 执行处理并返回处理后的二进制数据

			 $stor = new SaeStorage();

			 $stor->write('img',"$isbn.jpg","$new_data");

			 $pic = $stor->getUrl('img',"$isbn.jpg");

			 $bookinfo = array('isbn'=>$isbn,'name'=>$name,
			 					'writer'=>$writer,'pic'=>$pic,
			 				    'trans'=>$trans,'page'=>$page,
			 					'price'=>$price,'year'=>$year,
			 					'publisher'=>$publisher,'intro'=>$intro
			 					);

		//写入mc中,数据保存一天，存一份list列表
		$current_list = unserialize(memcache_get($mmc,'isbn_list'));
		if(!is_array($current_list)){
			$current_list = array();
		}
		if(count($current_list) > 100){
			array_shift($current_list);
			array_push($current_list,$isbn);
		}else{
			array_push($current_list,$isbn);
		}
		memcache_set($mmc,'isbn_list',serialize($current_list));
		memcache_set($mmc,$isbn,serialize($bookinfo),86400);

	 	$data['state'] = 'success';
	 	$data['info'] = '成功从豆瓣网获取测试数据，数据缓存一天';
	 	$data['bookinfo'] = createHtml($bookinfo);
	 	echo json_encode($data);
		}

	}
?>