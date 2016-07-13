<?php
	class Hema{
		private static $_instance;
		public function __construct(){
			
		}
		
		public function getInstance(){
			if(self::$_instance == NULL){
				self::$_instance = new Hema();
			}
			return self::$_instance;
		}
		
		public function write($str){
			echo $str."<br/>";
		}
	}
	
	$instance = Hema::getInstance();
	$instance->write('dddd');
	
?>