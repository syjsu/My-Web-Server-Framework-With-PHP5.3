<?php
	/**
	 * YunPHP4SAE php framework designed for SAE
	 *
	 * @author heyue <heyue@foxmail.com>
	 * @copyright Copyright(C)2010, heyue
	 * @link http://code.google.com/p/yunphp4sae/
	 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
	 * @version YunPHP4SAE version 1.0.2
	 */

	//StuAction.class.php 学生信息管理的控制器
	class StuAction extends Action{

		public function __construct(){
			session_start();
			$this->model('stu');
			parent::__construct();
//			if($_SESSION['name'] == ''){
//				  $this->login();
//			}s
		}
		public function index(){
			$name = 'hema';
			$intro = '一个很无聊的phper！';
			require_once (DIR_VIEW.'stu/index.php');
		}
		public function stulist($cur_page=1){
			$this->model('stu');
			$stu = new StuModel();
			$per_page = 5;
			$start = $per_page*($cur_page-1);
			$list = $stu->getStuList($start,$per_page);
			$count = $stu->getTotal();

			$this->load_helper('Page');
			$config['base_url'] = '/stu/stulist/'; //当前的url，如果有参数需要拼接一下url
			$config['total_rows'] = $count; //传递总数
			$config['per_page'] = $per_page; //传递每页的数量
			$config['cur_page'] = $cur_page; //传递当前页码
			$pageStr = new Page($config);
			$page = $pageStr->create_links(); //创建新页码
			$this->assign('total',$config['total_rows']);
			$this->assign('per_page',$config['per_page']);
			$this->assign('page',$page);

			$this->assign('stulist',$list);
			$this->display('stu/stulist.php');
		}
		/**
		 * 查看详细信息
		 *
		 * @param unknown_type $id
		 */
		public function info($id){
			$this->model('stu');
			$stu = new StuModel();
			$res = $stu->getStuInfo($id);
			$this->assign('info',$res);
			$this->display("stu/info.php");
		}
		/**
		 * 添加
		 *
		 */
		public function add(){
			if($_POST){
				$this->model('stu');
				$stu = new StuModel();
				$res = $stu->addStu($_POST);
				if($res){
					$this->success("添加成功",'/stu/list');
				}else{
					$this->error('添加失败');
				}
			}
			$this->display('stu/add.php');
		}

		public function edit($id){
			$stu  = new StuModel();

			if($_POST){
				$res = $stu->stuSave($_POST,$id);
				if($res){
					$this->success("编辑成功");
				}else{
					$this->error("编辑失败");
				}
			}
			$res = $stu->getStuInfo($id);
			$this->assign('res',$res);
			$this->display('stu/edit.php');
		}

		/**
		 * 登陆
		 *
		 */
		public function login_do(){
			if($_POST){
				$name = $_POST['name'];
				$psw = $_POST['psw'];

				var_dump($_POST);
				$stu = new StuModel();
				$res = $stu->loginCheck($name,$psw);
				if($res){
					$_SESSION['name'] = $res[0]['name'];
					$this->success("登录成功!",'/');
				}else{
					$this->error("登录失败！");
				}
			}

		}
		public function login(){
			$this->display('stu/login.php');
			exit();
		}
		/**
		 * 注册
		 *
		 */
		public function reg(){
			if($_POST){
				$this->model('stu');
				$stu = new StuModel();
				$res = $stu->addStu($_POST);
				if($res){
					echo 'reg success ';
				}else{
					echo 'reg error!';
				}
			}
			$this->display('stu/reg.php');
		}
		/**
		 * 分页处理
		 *
		 * @param unknown_type $page
		 */
		public function page($cur_page = 1){
			if(!is_numeric($cur_page)){
				$cur_page = 1;
			}
			$this->load_helper('Page');
			$config1['base_url'] = '/stu/page/';
			$config1['total_rows'] = 200;
			$config1['per_page'] = 20;
			$config1['cur_page'] = $cur_page;
			$pageStr1 = new Page($config1);
			$page1 = $pageStr1->create_links();
			$this->assign('total1',$config1['total_rows']);
			$this->assign('per_page1',$config1['per_page']);
			$this->assign('page1',$page1);

			$config2['base_url'] = '/stu/page';
			$config2['total_rows'] = 80;
			$config2['per_page'] = 20;
			$config2['cur_page'] = $cur_page;
			$pageStr2 = new Page($config2);
			$page2 = $pageStr2->create_links();
			$this->assign('total2',$config2['total_rows']);
			$this->assign('per_page2',$config2['per_page']);
			$this->assign('page2',$page2);

			$config3['base_url'] = '/stu/page/';
			$config3['total_rows'] = 200;
			$config3['per_page'] = 20;
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

			$this->display('/stu/page.php');


		}
		public function menu(){
			$this->display('stu/menu.php');
		}

		public function __call($id,$arguments){
			$this->model('stu');
			if(is_numeric($id)){
				$stu = new StuModel();
				$res = $stu->getStuInfo($id);
				$this->assign('info',$res);
				$this->display('stu/info.php');
			}
		}

		public function testConfig(){
			echo '1';
			require_once YUNPHP.'lib/Configure.class.php';
			echo '2';
			Configure::load('config');
			$config = Configure::getItems('config');
			var_dump($config);
		}

		public function source(){
			header("Content-type: text/html; charset=utf-8");
			highlight_file(DIR_ACTION.'StuAction.class.php');
		}
	}
?>