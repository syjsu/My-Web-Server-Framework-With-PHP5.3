<?php
	class PageAction extends Action{
		public  function __construct(){
			parent::__construct();
		}
		
		/**
		 * 分页处理
		 *
		 * @param unknown_type $page
		 */
		public function index($cur_page = 1){
			if(!is_numeric($cur_page)){
				$cur_page = 1;
			}
			//加载model
			$this->model('stu');
			$stu = new StuModel();
			$per_page = 5;
			$start = $per_page*($cur_page-1);
			$list = $stu->getStuList($start,$per_page);
			$count = $stu->getTotal();
			
			//处理分页
			$this->load_helper('Page'); //加载Page的三方库
			$config1['base_url'] = '/page/index/'; //当前的url，如果有参数需要拼接一下url
			$config1['total_rows'] = $count; //传递总数
			$config1['per_page'] = $per_page; //传递每页的数量 
			$config1['cur_page'] = $cur_page; //传递当前页码
			$pageStr1 = new Page($config1); 
			$page1 = $pageStr1->create_links(); //创建新页码
			$this->assign('total1',$config1['total_rows']);
			$this->assign('per_page1',$config1['per_page']);
			$this->assign('page1',$page1);
			
			$config2['base_url'] = '/page/index/';
			$config2['total_rows'] = $count;
			$config2['per_page'] = $per_page;
			$config2['cur_page'] = $cur_page;
			$pageStr2 = new Page($config2);
			$page2 = $pageStr2->create_links();
			$this->assign('total2',$config2['total_rows']);
			$this->assign('per_page2',$config2['per_page']);
			$this->assign('page2',$page2);
			
			$config3['base_url'] = '/page/index/';
			$config3['total_rows'] = $count;
			$config3['per_page'] = $per_page;
			$config3['cur_page'] = $cur_page;
			$config3['page_tab_open']=$config3['prev_tag_open']=$config3['next_tag_open']=$config3['last_tag_open']= $config3['first_tag_open'] = "<span class='page_style'>";
			$config3['page_tab_close']=$config3['prev_tag_close']=$config3['next_tag_close']=$config3['last_tag_close']= $config3['first_tag_close'] = "</span>";
			$config3['cur_tag_open'] = "<span class='page_cur'>";
			$config3['cur_tag_close'] = "</span>";
			$config3['num_tag_open'] = '共<b>';
			$config3['num_tag_close'] = '</b>条符合条件的记录';
			$pageStr3 = new Page($config3);
			$page3 = $pageStr3->create_links();
			$this->assign('total3',$config3['total_rows']);
			$this->assign('per_page3',$config3['per_page']);
			$this->assign('page3',$page3);
			
			$this->assign('stulist',$list);
			$this->display('/page/index.php');	
		}
	}
		
?>