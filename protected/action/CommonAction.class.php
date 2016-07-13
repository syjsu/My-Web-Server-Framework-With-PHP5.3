<?php
	class CommonAction extends Action {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function download($id){
			if(!is_numeric($id)){
				$this->error("url参数错误，请联系管理员");
			}
			$this->load_class('Db');
			$db = new Db();
			$res = $db->getById('version',$id);
			$sql = "update version set download_num = download_num+1 where id = $id";
			$db->runSql($sql);
			$db->close_db();
			header("Location:$res[download]");
		}
	}
?>