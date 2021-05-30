<?php include ( "inc/connect.inc.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
	$uname_db = $get_user_email['firstName'];
	$uemail_db = $get_user_email['email'];
	$upass = $get_user_email['password'];
	$umob_db = $get_user_email['mobile'];
	$uadd_db = $get_user_email['address'];
}

if (isset($_GET['uid'])) {
	
	$user2 = mysqli_real_escape_string($conn,$_REQUEST['uid']);
	if($user != $user2){
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

if (isset($_POST['changesettings'])) {
//declere veriable
$email = $_POST['email'];
$opass = $_POST['opass'];
$npass = $_POST['npass'];
$npass1 = $_POST['npass1'];
//triming name
	try {
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
			
		}
			if(isset($opass) && isset($npass) && isset($npass1) && ($opass != "" && $npass != "" && $npass1 != "")){
				if( md5($opass) == $upass){
					if($npass == $npass1){
						$npass = md5($npass);
						mysqli_query($conn,"UPDATE user SET password='$npass' WHERE id='$user'");
						$success_message = '
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							Password changed.
						</font></div>';
					}else {
					$success_message = '
						<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
						<font face="bookman">
							New password not matched!
						</font></div>';
					}
				}else {
				$success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.
					</font></div>';
				}
			}else {
				$success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.
					</font></div>';
				}

			if($uemail_db != $email) {
				if(mysqli_query($conn,"UPDATE user SET  email='$email' WHERE id='$user'")){
					//success message
					$success_message = '
					<div class="signupform_text" style="font-size: 18px; text-align: center;">
					<font face="bookman">
						Settings change successfull.
					</font></div>';
				}
			}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>
<?php 
    include("includes/header.php");
    require_once("includes/profile_nav.php");
?>

	<div style="margin-top: 20px;">
		
		
		
					<div style="padding-top:10px;">
						<form action="" method="POST" class="sign-up-form">
							
								<h4>
									Change Password:
								</h4>
									<input type="password" name="opass" placeholder="Old Password">
									<input type="password" name="npass" placeholder="New Password">
									<input type="password" name="npass1" placeholder="Repeat Password"></br>
								<h4>
									Change Email:<br></tr>
								</h4>
									<?php echo '<input required type="email" name="email" placeholder="New Email" value="'.$uemail_db.'">'; ?>
									<input  type="submit" name="changesettings" value="Update Settings">
								
								<p>
									<?php if (isset($success_message)) {echo $success_message;} ?>
								</p>
				
						</form>
					</div>
				
		
	</div>

	
<?php 
    include("includes/footer.php");
?>