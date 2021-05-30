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

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];
}

if (isset($_REQUEST['uid'])) {
	
	$user2 = mysqli_real_escape_string($conn,$_REQUEST['uid']);

	if($user != $user2){
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

$search_value = "";
?>

<?php require_once("includes/header.php"); ?>
<?php require_once("includes/profile_nav.php"); ?>
<h2 class="text-center">Your Orders</h2>
	<div style="margin: 20px auto; max-width:1200px;border:1px solid #ddd;">
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
			
				<?php include ( "inc/connect.inc.php");
				$query = "SELECT * FROM orders WHERE uid='$user' ORDER BY id DESC";
				$run = mysqli_query($conn,$query);
				while ($row=mysqli_fetch_assoc($run)) {
					$pid = $row['pid'];
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
				<td><?php echo $dstatus; ?></td>
				<td><?php echo '<div class="home-prodlist-img"><a href="OurProducts/view_product.php?pid='.$pId.'">
								<img src="'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
								</a>
							</div>' ?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>	
	</div>

	
<?php include("includes/footer.php"); ?>