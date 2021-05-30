<?php include("inc/connect.inc.php"); ?>
<?php

if (!isset($_SESSION['user_login'])) {
    $user = "";
} else {
    $user = $_SESSION['user_login'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id='$user'");
    $get_user_email = mysqli_fetch_assoc($result);
    $uname_db = $get_user_email['firstName'];
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
		<div class="bg-light" style="max-width: 1400px;margin-left:auto;margin-right:auto;min-height:100vh;">
		<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #dfe6e9;">
    		<a class="navbar-brand" href="#">Food Delivery</a>
    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
       			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       		 <span class="navbar-toggler-icon"></span>
  		  	</button>

    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="menu.php">Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="feedback.php">Feedback</a>
					</li>
					
				</ul>
					<form class="form-inline my-2 my-lg-0" id="newsearch" method="get" action="search.php" style="margin-right:35px;">
						<input class="form-control mr-sm-2" type="text" name="keywords" size="21" maxlength="120" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" value="search" type="submit">Search</button>
					</form>
					<div>
						<a href="mycart.php?uid=<?php echo $user ?>"><img src="img/cart-icon.png" alt="cart" style="max-height:40px;margin-right:35px;"></a>
					</div>
					<div style="margin-right:35px;">
						<?php
							if ($user!="") {
								echo '<a style="text-decoration: none; " href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
							} else {
								echo '<a style="text-decoration: none; " href="login.php">LOG IN</a>';
							}
						?>
					</div>
					<div style="margin-right:35px;">
						<?php
							if ($user!="") {
								echo '<a style="text-decoration: none;" href="logout.php">LOG OUT</a>';
							} else {
								echo '<a style=" text-decoration: none;" href="signin.php">SIGN UP</a>';
							}
						?>
					</div>		
    		</div>
		</nav>