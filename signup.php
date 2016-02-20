<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<meta charset="utf-8">
</head>
<style type="text/css">
	label {
		float: left;
		width: 100px;
	}
</style>
<body>
<table align="center"><tr><td>
	<form action="signup.php" name="TungfpmForm" method="post">
		<p><label>Username : </label><input type="text" name="fuser" /></p>
		<p><label>Password : </label><input type="text" name="fpass" /></p>
		<p><label>Email : </label><input type="text" name="femail" /></p>
		<center><p><input type="submit" name="login" value="Login" />
		<input type="submit" name="submit" value="Register" /></p>
		</center>
	</form>
</td></tr>
<tr><td>
<?php
	require_once("user.php");
	session_start();
	$u = "";
	$p = "";
	$e = "";
	if (isset($_POST['submit'])){
		if($_POST['fuser'] == NULL) {
			echo "Tên đăng nhập trống<br />";
		}else{
			$u=$_POST['fuser'];
		}
		if ($_POST['fpass'] == NULL) {
			echo "Mật khẩu trống<br />";
		} else {
			$p = ($_POST['fpass']);
		}
		if($_POST['femail'] == NULL) {
			echo "Email trống<br />";
		}else{
			$e=$_POST['femail'];
		}

		$l= 1;

		$user = new user;
		$i = $user->getRealIPAddress();

		if($u != "" && $p != "" && $e != "" && $l && $i){
			
			$user->set_username($u);
			$user->set_password($p);
			$user->set_email($e);
			$user->set_level($l);
			$user->set_ip($i);

			if ($user->check_username()) {
				if ($user->check_ip()) {
					$user->insert_user();
					$_SESSION['ses_username'] = $user->get_username();
					$_SESSION['ses_password'] = $user->get_password();
					$_SESSION['ses_level'] = $user->get_level();
					header("location:index.php");
				} else {
					echo "Trùng IP rồi. Change IP đi";
				}				
			} else {
				echo "Tên đăng nhập đã tồn tại";
			}
		}
	}

	if (isset($_POST['login'])) {
		header("location:login.php");
	}
?>
</td></tr>
</table>

</body>
</html>
