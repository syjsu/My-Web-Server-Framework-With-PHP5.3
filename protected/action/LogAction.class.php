<?php
	class LogAction extends Action {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function index(){
			$this->display('log/index.php');	
		}
		
		public function show(){
			header('Content-Type:   text/html;   charset=utf-8');
			Log::show_log();
		}
	}
?>