<!DOCTYPE html>
<html>
<head>
	<title>Add user</title>
	<meta charset="utf-8">
</head>
<style type="text/css">
	body{
		background: url(images/blur_colors.jpg);
		background-position: scroll; 
		background-repeat: no-repeat;
		background-origin: cover;
	}
	form{
		margin-top: 100px;
	}
</style>
<body>
<form action="add_user.php" name="TungfpmForm" method="post">
<table align="center" cellpadding="10px">
	<tr>
		<td>Level : </td>
		<td>
			<select name="level">
				<option value="1">Administrator</option>
				<option value="2">Member</option>				
			</select>
		</td>
	</tr>	
	<tr>
		<td>Username : </td>
		<td><input type="text" name="txtuser" size="25" /></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input type="password" name="txtpass" size="25" /></td>
	</tr>
	<tr>
		<td>Re-password:</td>
		<td><input type="password" name="txtpass2" size="25" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Add" />
		<input type="submit" name="back" value="Back" />
		</td>
	</tr>
	
</table>
</form>
</body>
</html>

<?php
require_once("user.php");
session_start();
if ($_SESSION['ses_level'] != 2) {
	header("location:login.php");
	exit();
}
if (isset($_POST['submit'])){
	if($_POST['txtuser'] == NULL) {
		echo "Username not be empty<br />";
	}else{
		$u=$_POST['txtuser'];
	}
	if ($_POST['txtpass'] == NULL) {
		echo "Password not be empty<br />";
	} else {
		if($_POST['txtpass'] != $_POST['txtpass2']){
			echo "Passwords do not match";
		} else {
			$p = ($_POST['txtpass']);
		}
	}

	$l=$_POST['level'];

	if($u && $p && $l){
		$user = new user;
			$user->set_username($u);
			$user->set_password($p);
			$user->set_level($l);

			if ($user->check_username()) {
				$user->insert_user();
				echo "Insert Success";
			} else {
				echo "Username existed";
			}
	}
}
if (isset($_POST['back'])) {
    header("location:index.php");
}
?>

