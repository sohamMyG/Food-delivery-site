<?php include("inc/connect.inc.php"); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}

$u_fname = "";
$u_lname = "";
$u_email = "";
$u_mobile = "";
$u_address = "";
$u_pass = "";
$conn = mysqli_connect("localhost","root","","delivery") or die("Couldn't connect to SQL server");

if (isset($_POST['signup'])) {
//declare variable
$u_fname = $_POST['first_name'];
$u_lname = $_POST['last_name'];
$u_email = $_POST['email'];
$u_mobile = $_POST['mobile'];
$u_address = $_POST['signupaddress'];
$u_pass = $_POST['password'];
//triming name
$_POST['first_name'] = trim($_POST['first_name']);
$_POST['last_name'] = trim($_POST['last_name']);
	try {
		if(empty($_POST['first_name'])) {
			throw new Exception('Fullname can not be empty');
			
		}
		if (is_numeric($_POST['first_name'][0])) {
			throw new Exception('Please write your correct name!');

		}
		if(empty($_POST['last_name'])) {
			throw new Exception('Lastname can not be empty');
			
		}
		if (is_numeric($_POST['last_name'][0])) {
			throw new Exception('lastname first character must be a letter!');

		}
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
			
		}
		if(empty($_POST['mobile'])) {
			throw new Exception('Mobile can not be empty');
			
		}
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
			
		}
		if(empty($_POST['signupaddress'])) {
			throw new Exception('Address can not be empty');
			
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			throw new Exception('Invalid email!');
		}
		
		// Check if email already exists
		
		$check = 0;
		$e_check = mysqli_query($conn , "SELECT email FROM `user` WHERE email='$u_email'");
		$email_check = mysqli_num_rows($e_check);
			if ($check == 0 ) {
				if ($email_check == 0) {
					if (strlen($_POST['password']) >4 ) {
					
						$_POST['first_name'] = ucwords($_POST['first_name']);
						$_POST['last_name'] = ucwords($_POST['last_name']);
						$_POST['last_name'] = ucwords($_POST['last_name']);
						$_POST['email'] = mb_convert_case($u_email, MB_CASE_LOWER, "UTF-8");
						$_POST['password'] = md5($_POST['password']);
						
						$result = mysqli_query($conn ,"INSERT INTO user (firstName,lastName,email,mobile,address,password) VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[mobile]','$_POST[signupaddress]','$_POST[password]')");
						
						$success_message = '
						<h2 class="text-center pt-5"> Registration successfull! </h2>
						<div class="text-center p-4">
							For Email: '.$u_email.'
						</div>';	
						
					}else {
						throw new Exception('Make strong password!');
					}
				}else {
					throw new Exception('Email already taken!');
				}
			}else {
				throw new Exception('Username already taken!');
			}
			

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>



<?php 
    require_once("includes/header.php");
    if(isset($success_message)) {echo $success_message;}
    else {
        echo '
                <h2 class="text-center pt-5">Sign Up Form!</h2>
                <form action="signin.php" method="POST" class="sign-up-form flex-container">
                    <input name="first_name" id="first_name" placeholder="First Name" required="required" type="text" size="30" value="'.$u_fname.'" >
                    <input name="last_name" id="last_name" placeholder="Last Name" required="required" type="text" size="30" value="'.$u_lname.'" >
                    <input name="email" placeholder="Enter Your Email" required="required"  type="email" size="30" value="'.$u_email.'">	
                    <input name="mobile" placeholder="Enter Your Mobile" required="required" type="tel"
					pattern="^\d{10}$" size="30"  value="'.$u_mobile.'">
                    <input name="signupaddress" placeholder="Write Your Full Address" required="required"  type="text" size="30" value="'.$u_address.'">
                    <input name="password" id="password-1" required="required"  placeholder="Enter New Password"  type="password" size="30" value="'.$u_pass.'">
                    <input name="signup" class="uisignupbutton signupbutton" type="submit" value="Sign Me Up!">
                    <div class="signup_error_msg">';
                                           if (isset($error_message)) {echo $error_message;}     
                        echo'</div>
                </form>
        ';
    }

?>
    
<?php include("includes/footer.php"); ?>	