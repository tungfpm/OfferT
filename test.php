<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="test.php" method="post">
	<input type="submit" name="submit" />
</form>
</body>
</html>
<?php
	require_once("user.php");
	$u = new user;
	if (isset($_POST['submit'])){
		$ip1 = $u->getRemoteIPAddress();
		$ip2 = $u->getRealIPAddress();
		// echo $ip1;
		// echo $ip2;
		echo $_SERVER['REMOTE_ADDR'];  
	}
	
?>