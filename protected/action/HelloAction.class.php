<?php
	class HelloAction extends Action{
		function __construct(){
			parent::__construct();
		}

		public function index(){
			$welcome = "Hello welcome to YunPHP For SAE";
			$this->assign('welcome',$welcome);
			$this->display('hello/index.php');
		}
	}
?>