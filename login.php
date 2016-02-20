<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<center>
	<form action="login.php" name="TungfpmForm" method="post">
		<br><br />
		<p>Username: <input type="text" name="txtuser" size="25" /></p>
		<p>Password: <input type="password" name="txtpass" size="25" /></p>
		<p><input type="submit" name="submit" value="Login" />
		<input type="submit" name="sign" value="Sign Up" /></p>
	</form>
</center>
</body>
</html>
<?php
	session_start();
	require("user.php");
	$u = "";
	$p = "";
	if(isset($_POST['submit'])){
		if($_POST['txtuser'] == NULL){
			echo "Username not be empty<br/>";
		}else{
			$u = $_POST['txtuser'];
		}
		if($_POST['txtpass'] == NULL){
			echo "Password not be empty<br/>";
		}else{
			$p = ($_POST['txtpass']);
		}
		if($u && $p) {
			$user = new user;
			$user->set_username($u);
			$user->set_password($p);
			$data = $user->check_login();
			if ($data == false) {
				echo "Login Faild";
			} else {
				$_SESSION['ses_username'] = $data['username'];
				$_SESSION['ses_level'] = $data['level'];
				header("location:index.php");
				exit();
			}
		}
	}

	if (isset($_POST['sign'])) {
		header("location:signup.php");
	}
?>