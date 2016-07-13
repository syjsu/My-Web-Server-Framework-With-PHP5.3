<?php
	class BugAction extends Action{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->display('bug/index.php');
		}
	}
?>