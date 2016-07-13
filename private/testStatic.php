<?php
	class Hema{
		public static $instance;
		public static $name = 'diandian';
		public function __construct(){
			echo "this is the construct function";
			self::$instance = &$this;
		}
		
		public static function showWrite($name){
			echo "showWrite $name";
		}
		
		public static function getName(){
			echo self::$name;
		}
		
		public static function &getInstance(){
			return Hema::$instance;
		}
		
	}
	Hema::$name = 'hema';
	echo Hema::$name."<br/>";
	echo Hema::getName();
?>