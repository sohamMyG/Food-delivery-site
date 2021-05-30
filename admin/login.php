<?php include("../inc/connect.inc.php"); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
}
else {
	header("location: index.php");
}
$emails = "";
$passs = "";
$conn = mysqli_connect("localhost","root","","delivery") or die("Couldn't connect to SQL server");

if (isset($_POST['login'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user_login = mysqli_real_escape_string($conn,$_POST['email']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");	
		$password_login = mysqli_real_escape_string($conn,$_POST['password']);		
		$num = 0;
		$password_login_md5 = md5($password_login);
		$result = mysqli_query($conn,"SELECT * FROM admin WHERE (email='$user_login') AND password='$password_login_md5'");
		$num = mysqli_num_rows($result);
        $get_user_email = mysqli_fetch_assoc($result);
        if($get_user_email!==null){ 
            $get_user_uname_db = $get_user_email['id'];
		    if ($num>0) {
			$_SESSION['admin_login'] = $get_user_uname_db;		
			header('location: index.php');
	
			exit();
		}
        }
		
		else {

			$error_message = '
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Email or Password incorrect.<br>
				</font></div>';
		}
			
		
	}

}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Healthy food</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/profile.css">
		
	</head>
	<body class="bg-secondary">
		<div class="bg-light" style="max-width: 1400px;margin-left:auto;margin-right:auto;min-height:100vh">
                <div class="flex-container">
					<div style="margin:2rem; font-size:20px;">
						<?php
							if (isset($_SESSION['admin_login'])) {
								echo '<a style="text-decoration: none; " href="profile.php?uid='.$user.'">Hi '.$_SESSION['admin_login'].'</a>';
							} else {
								echo '<a style="text-decoration: none; " href="login.php">LOG IN</a>';
							}
						?>
					</div>
					<div style="margin:2rem; font-size:20px;">
						<?php
							if (isset($_SESSION['admin_login'])) {
								echo '<a style="text-decoration: none;" href="logout.php">LOG OUT</a>';
							} 
						?>
					</div>		
                    </div>
		
		<h2 class="text-center pt-5">Login Form</h2>
        <form action="" method="POST" class="sign-up-form" style="height:400px;">
                <input name="email" placeholder="Enter Your Email" required="required"  type="email" size="30" value="<?php $emails ?>">
                <input name="password" id="password-1" required="required"  placeholder="Enter Password" type="password" size="30" value="<?php $passs ?>">
                <input name="login" type="submit" value="Log In">
    
                
                <div>
                    <?php 
                        if (isset($error_message)) {echo $error_message;}   
                    ?>
                </div>
        </form>
					
<?php include("../includes/footer.php"); ?>