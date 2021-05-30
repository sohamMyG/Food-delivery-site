<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
session_start();
if (!isset($_SESSION['admin_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
		
}
$search_value = "";
?>

<?php include("../inc/connect.inc.php"); ?>
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
							} else {
								echo '<a style=" text-decoration: none;" href="signin.php">SIGN UP</a>';
							}
						?>
					</div>		
        </div>


		
		<div style="text-align: center; padding-bottom:20px; ">
			<div>
				<h1>Welcome To Admin Panel</h1>
			</div>
        </div>

        <table class="table text center">
			<thead>
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Price</th>
					<th scope="col">Total Product</th>
					<th>Order Date</th>
					<th scope="col">Delivery Place</th>
					<th scope="col">Delivery Status</th>
					<th scope="col">View</th>
				</tr>
			</thead>
			<tbody>
			
				<?php include ( "../inc/connect.inc.php");
				$query = "SELECT * FROM orders ORDER BY id DESC";
				$run = mysqli_query($conn,$query);
				while ($row=mysqli_fetch_assoc($run)) {
                    $pid = $row['pid'];
                    $oid = $row['id'];
					$quantity = $row['quantity'];
					$oplace = $row['oplace'];
					$mobile = $row['mobile'];
					$odate = $row['odate'];
					$dstatus = $row['dstatus'];
					
					//get product info
					$query1 = "SELECT * FROM products WHERE pid={$pid}";
					$run1 = mysqli_query($conn,$query1);
					$row1=mysqli_fetch_assoc($run1);
					$pId = $row1['pid'];
					$pName = $row1['pName'];
					$price = $row1['price'];
					$picture = $row1['strMealThumb'];
					

					?> <tr>
				<td><?php echo $pName; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $quantity; ?></td>
				<td><?php echo $odate; ?></td>
				<td><?php echo $oplace; ?></td>
				<td><?php echo '<a href="orderconfirm.php?id='.$oid.'">'.$dstatus?></td>
				<td><?php echo '<div class="home-prodlist-img"><a href="OurProducts/view_product.php?pid='.$pId.'">
								<img src="'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
								</a>
							</div>' ?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
        

<?php 
    include("../includes/footer.php");
?>
