<?php
	class Config {
		 public static $mainConfig = array();
		 public static $is_load = array();
		
		public static function load($file){
			if(in_array($file,self::$is_load)){
				echo "$file has been loaded!<br/>";
				return true;
			}
			
			if(file_exists($file.'.php')){
				require_once ($file.'.php');
				self::$mainConfig[$file] = $config;
				self::$is_load[] = $file;
			}else{
				echo 'file config exist!';
			}
		}
		
		public function getItems(){
			return self::$mainConfig;
		}
		
		public function getIsLoad(){
			return self::$is_load;
		}
	}
	
	Config::load('config');
	$res = Config::getItems();
	var_dump($res);
	var_dump(Config::getIsLoad());
	echo 'the fist to load config<br/>';
	
	Config::load('route');
	var_dump(Config::getItems());
	var_dump(Config::getIsLoad());
	
	echo 'the first time to load route<br/>';
	
	Config::load('config');
	$res = Config::getItems();
	var_dump($res);
	var_dump(Config::getIsLoad());
	echo 'the second time to load config<br/>';
?>