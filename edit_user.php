<?php
    require_once("session.php");
    require_once("user.php");
    $id = $_GET['uid'];
    $user = new user;
    $data = $user->get_userdata($id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<style>
    label {
        float : left;
        width :100px;
    }
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
<table align="center">
<tr><td>
 	<form action="edit_user.php?uid=<?php echo $id; ?>" method="post">
        <p><label>&nbsp</label>
    		<select name="flevel">
    			<option value="2" <?php if ($data['level'] == 1) {echo 'selected=""';}?>>Member</option>
    			<option value="1"<?php if ($data['level'] == 2) {echo 'selected=""';}?>>Administrator</option>    
    		</select>
		</p>
	    <p><label>Username</label><input type="text"  value="<?php echo $data['username'] ;?>" name="fuser"></p>	
	    <p><label>Password</label><input type="password" value="<?php echo $data['password'] ;?>" name="fpass"></p>
	    <p><label>Re-Password</label><input type="password" value="<?php echo $data['password'] ;?>" name="fpass2"></p>
	    <p>
            <label>&nbsp</label><button type="submit" name="submit">Update User</button>
            <button type="submit" name="back">Back</button>
        </p>
 	</form>
</td></tr>
</talbe>
</body>
</html>
<?php
    echo "<br/>";
    echo "<font color='red'>";
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
                if($_POST['fpass'] != $_POST['fpass2']){
                    echo "Mật khẩu không trùng khớp";
                    $p = "dismatch";
                } else {
                    $p = ($_POST['fpass']);
                }
            }

            $l= $_POST['flevel'];;

            if($u != "" && $p != "dismatch" && $l){
                $user = new user;
                    $user->set_username($u);
                    $user->set_password($p);
                    $user->set_level($l);

                    if ($user ->check_user($data['username'])) {
                        $user->update_user($id);
                        header("location:index.php");
                        exit();
                    } else {
                        echo "Tên đăng nhập đã tồn tại";
                    }
            }
        }
    echo "</font>";

    if (isset($_POST['back'])) {
        header("location:index.php");
    }
?>				