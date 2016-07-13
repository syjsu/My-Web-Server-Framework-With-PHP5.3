<?php

	class IndexAction extends Action{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->display('index.php');
		}

		public function test(){
			echo "welcome to the test!<br/>";
			$this->display('test.php');
		}

		public function header(){
			$this->display('header.php');
		}

		public function footer(){
			$this->display('footer.php');
		}
	}

?>