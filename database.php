<?php
	class database{
		private $hostname = "localhost";
		private $username = "tungfpm";
		private $password = "tungzpm";

		// private $hostname = "mysql.hostinger.vn";
		// private $username = "u616468934_root1";
		// private $password = "khacmuoi91";

		private $database = "u616468934_thpt";
		private $conn;
		private $result;

		public function connect(){
			$this->conn = mysql_connect($this->hostname,$this->username,$this->password);
			mysql_select_db($this->database,$this->conn) or die("Can't connect to DB");
		}
		public function query($sql){
			$this->result = mysql_query($sql);
		}
		public function num_rows(){
			if ($this->result) {
				$row = mysql_num_rows($this->result);
			} else {
				$row = 0;
			}
			return $row;
		}
		public function fetch(){
			if ($this->result) {
				$data = mysql_fetch_assoc($this->result);
			} else {
				$data = 0;
			}
			return $data;
		}
	}

	// $db = new database;
	// $db->connect();
	// $sql = "select * from user order by id desc";
	// $db->query($sql);
	// $row = $db->num_rows();
	// echo $row;
	// while ($data=$db->fetch()) {
	// 	echo "<pre>";
	// 	print_r($data);
	// 	echo "</pre>";
	// 	echo $data['username'];
	// }
?>