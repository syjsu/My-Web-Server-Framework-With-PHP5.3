<?php
	class GameAction extends Action{

		//构造器
		function __construct(){
			session_start();
			parent::__construct();
		}

		//请求器
		function __call($url,$arguments){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			//执行SQL查询
			$this->load_class('Db');
			$this->db = new Db();
			$this->table = "User";
			$condition = "`username`='$username' and `password`='$password'";
			$ref = $this->db->selectData($this->table,$condition);

			if ($ref) {
				//设置返回值
				$rest["code"]=200;
				$rest["user_id"]=$ref["nick_name"];
				$rest["nick_name"]=$ref["nick_name"];
				//返回输出
				echo json_encode($rest,JSON_UNESCAPED_UNICODE);
				//设置Session
				$_SESSION['user_id'] =$ref["user_id"];
			}else{
				//设置返回值
				$rest["code"]=401;
				$rest["user_id"]="0";
				$rest["nick_name"]="账号密码错误";
				//返回输出
				echo json_encode($rest,JSON_UNESCAPED_UNICODE);
			}
		}

		//登录接口
		public function login(){
			echo "我是构造";
			if ($_REQUEST) {
				//echo "id = ".$id;
				//echo "word = ".$word;
				var_dump($_REQUEST);
				echo "我是构造";

				//$username = $_REQUEST['username'];
				//$password = $_REQUEST['password'];
				//if (isset($username) && isset($password)) {

				//	print_r($_REQUEST);
					//$condition = "`username`='".$username."'";
					//echo "账户信息是".$condition;

					/*
					$ref = $this->db->selectData($this->table,$condition);
					//如果账户存在
					if ($ref) {
						echo "账户信息是";
						var_dump($ref);
					}
					//账户不存在
					else{
						echo "账户不存在";
				// 	}*/
				// }else{
				// 	echo "没有接收到数据信息";
				// }
			}
		}
	}
?>