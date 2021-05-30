<?php include("inc/connect.inc.php"); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
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
		$result = mysqli_query($conn,"SELECT * FROM user WHERE (email='$user_login') AND password='$password_login_md5'");
		$num = mysqli_num_rows($result);
        $get_user_email = mysqli_fetch_assoc($result);
        if($get_user_email!==null){ 
            $get_user_uname_db = $get_user_email['id'];
            if ($num>0) {
                $_SESSION['user_login'] = $get_user_uname_db;
                setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
            
            
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

<?php include("includes/header.php"); ?>
		<h2 class="text-center pt-5">Login Form</h2>
        <form action="login.php" method="POST" class="sign-up-form" style="height:400px;">
                <input name="email" placeholder="Enter Your Email" required="required"  type="email" size="30" value="<?php $emails ?>">
                <input name="password" id="password-1" required="required"  placeholder="Enter Password" type="password" size="30" value="<?php $passs ?>">
                <input name="login" type="submit" value="Log In">
    
                <div style="float: right;">
                    <a class="forgetpass" href="signin.php">
                        <span>Register</span>
                    </a>
                </div>
                <div>
                    <?php 
                        if (isset($error_message)) {echo $error_message;}   
                    ?>
                </div>
        </form>
					
<?php include("includes/footer.php"); ?>