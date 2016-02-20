<?php
	require("database.php");
	class user extends database{
		public $_username;
		public $_password;
		public $_level;
		public $_ip;

		public function __construct(){
			$this->connect();
		}
		public function set_username($user){
			$this->_username = $user;
		}
		public function get_username(){
			return $this->_username;
		}
		public function set_password($pass){
			$this->_password = $pass;
		}
		public function get_password(){
			return $this->_password;
		}
		public function set_email($e){
			$this->_email = $e;
		}
		public function get_email(){
			return $this->_email;
		}
		public function set_ip($i){
			$this->_ip = $i;
		}
		public function get_ip(){
			return $this->_ip;
		}
		public function set_level($l){
			$this->_level = $l;
		}
		public function get_level(){
			return $this->_level;
		}

		public function getRemoteIPAddress(){
		    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		    return $ip;
		}
		  
		/* If your visitor comes from proxy server you have use another function
		to get a real IP address: */

		public function getRealIPAddress(){  
		    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		        //check ip from share internet
		        $ip = $_SERVER['HTTP_CLIENT_IP'];
		    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		        //to check ip is pass from proxy
		        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }else{
		        $ip = $_SERVER['REMOTE_ADDR'];
		    }
		    return $ip;
		}

		public function check_login(){
			$sql = "select * from user where username='".$this->get_username()."'
			and password='".$this->get_password()."'";
			$this->query($sql);
			if ($this->num_rows() == 0) {
				return false;
			} else {
				return $this->fetch();
			}
		}

		public function list_user(){
			$sql = "select * from user where level != '2'";
			$this->query($sql);
			if ($this->num_rows() == 0) {
				$data = 0;
			} else {
				while ($row = $this->fetch()) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function insert_user(){
			$sql = "insert into user(username,password,email,ip,level) values('".$this->get_username()."',
				'".$this->get_password()."','".$this->get_email()."','".$this->get_ip()."','".$this->get_level()."')";
			$this->query($sql);
		}

		public function check_username(){
			$sql = "select * from user where username='".$this->get_username()."'";
			$this->query($sql);
			if ($this->num_rows() == 0) {
				return true;
			} else {
				return false;
			}
		}

		public function check_ip(){
			$sql = "select * from user where ip='".$this->get_ip()."'";
			$this->query($sql);
			if ($this->num_rows() == 0) {
				return true;
			} else {
				return false;
			}
		}

		public function check_user($u){
			if ($this->get_username() != $u) {
				$sql ="select * from user where username='".$this->get_username()."'";
			} else {
				$sql ="select * from user where username='19121994'";
			}
			$this -> query($sql);
			if ($this->num_rows() == 0) {
				return true;
			} else {
				return false;
			}
		}

		public function get_userdata($id){
			$sql = "select * from user where username ='$id'";
			$this -> query($sql);
			return $this -> fetch();
		}

		public function update_user($id){
			if ($this->get_password() != "") {
				$sql = "update user set username='".$this->get_username()."',
				password='".$this->get_password()."',
				level='".$this->get_level()."'
				where id='$id'";
			} else {
				$sql = "update user set username='".$this->get_username()."',
				level='".$this->get_level()."'
				where id='$id'";
			}
			$this->query($sql);
		}

		public function del_user($id){
			$sql="delete from user where username='$id'";
			$this->query($sql);
		}
	}
?>