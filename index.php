<?php
	require("user.php");
	session_start();

	if ($_SESSION['ses_level'] == 1) {
		header("location:listoff.php");
		exit();
	} else if ($_SESSION['ses_level'] != 2){
		header("location:login.php");
		exit();
	}
	echo "<center>";
	echo "<h2><font color='red'>Hello " .$_SESSION['ses_username']."</font></h2>";
	echo "<a href='add_user.php'>Add Member</a> - <a href='logout.php'>Logout</a>";
	echo "</center>";	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage by Admin</title>
	<meta charset="utf-8">
<script>
	function xacnhan(){
		if(!window.confirm("Do you want to delete this user ?")){
			return false;
		}
	}
</script>
<style type="text/css">
	a{
		text-decoration: none;
	}
	table,tr,td{
		border: 1px solid;
		background-color: #fff;
	}
	body{
		background: url(images/blur_colors.jpg);
		background-position: scroll; 
		background-repeat: no-repeat;
		background-origin: cover;
	}
</style>
</head>
<body>
<br>
	<table width='900' align='center' cellspacing="0">
	<tr>
		<td>STT</td>
		<td>Username</td>
		<td>Password</td>
		<td>Email</td>
		<td>IP</td>
		<td>Level</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		
		$stt=0;
		$user = new user;
		$data = $user->list_user();
		
		foreach ($data as $item) {
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td>$item[username]</td>";
			echo "<td>$item[password]</td>";
			echo "<td>$item[email]</td>";
			echo "<td>$item[ip]</td>";
			if($item['level'] == 1){
				echo "<td>Member</td>";
			}else{
				echo "<td><font color='red'>Administrator</font></td>";
			}
			echo "<td><a href='edit_user.php?uid=$item[username]'>Edit</a></td>";
			echo "<td><a href='del_user.php?uid=$item[username]' onclick='return xacnhan()'>Del</a></td></tr>";
		}
	?>
	
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>