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

//HelpAction.class.php 帮助文档的控制器

	class HelpAction extends Action {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->display('help/index.php');
		}

		public function design(){
			$this->display('help/design.php');
		}
		/**
		 * Config的处理
		 *
		 */
		public function config(){
			$this->display('help/config.php');
		}
		/**
		 * 路由
		 *
		 */
		public function route(){
			$this->display('help/route.php');
		}
		/**
		 * helloWorld
		 *
		 */
		public function hello(){
			$this->display('help/hello.php');
		}

		public function exceptions(){
			$this->display('help/exceptions.php');
		}

		public function defines(){
			$this->display('help/defines.php');
		}

		public function functions(){
			$this->display('help/functions.php');
		}

		public function xhprof(){
			$this->display('help/xhprof.php');
		}

		public function thanks(){
			$this->display('help/thanks.php');
		}
		public function db(){
			$this->display('help/db.php');
		}

		public function source(){
			header("Content-type: text/html; charset=utf-8");
			highlight_file(DIR_ACTION.'HelpAction.class.php');
		}

	}
?>