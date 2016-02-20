<?php
require_once("user.php");
$id=$_GET['uid'];
if($id == 2){
	echo "<script>";
	echo "alert('Bạn không thể xóa thành viên này !!!'); window.location='index.php';</script>";
}else{
	$user = new user;
	$user->del_user($id);
	header("location:index.php");
	exit();
}
?>