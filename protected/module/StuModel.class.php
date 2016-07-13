<?php
	class StuModel extends Module {

		public $db ;
		private $table = 'stu';
		public function __construct(){
			parent::__construct();
			$this->load_class('Db');
			$this->db = new Db();
		}

		public function getStuList($start=0,$per_page=10){
			$this->load_class('Db');
			$sql = "select * from stu limit $start,$per_page";
			$res = $this->db->get_data($sql);
			return $res;
		}
		/**
		 * 从stu表中取得统计数量，默认缓存在mc中60s
		 *
		 * @param unknown_type $where
		 * @param unknown_type $cache
		 * @return unknown
		 */
		public function getTotal($where='',$cache=true){
			if($cache){
				$mmc = memcache_init();
				$stu_count = memcache_get($mmc,'stu_count');
				if($stu_count != FALSE){
					return $stu_count;
				}
			}
			$sql = "select count(*) as TOTAL from $this->table ";
			if($where !=''){
				$sql .= $where;
			}
			$stu_count = $this->db->getVar($sql);
			$this->db->closeDb();
			memcache_set($mmc,'stu_count',$stu_count,60);
		}

		public function getStuInfo($id){
			$info = $this->db->getById('stu',$id);
			return $info;
		}

		public function stuSave($data,$id){
			return $this->db->updateData($this->table,$data,"id = $id");
		}

		/**
		 * 登陆的用户名密码验证
		 *
		 * @param unknown_type $name
		 * @param unknown_type $psw
		 * @return unknown
		 */
		public function loginCheck($name,$psw){
			$condition = "`name`='$name' and `psw`='$psw'";
			return $this->db->selectData($this->table,$condition);
		}
		public function delStu($id){

		}

		public function addStu($data){
			return $this->db->insertData($this->table,$data);
		}
	}
?>