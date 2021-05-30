<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
}
if (isset($_GET['pid'])) {
	$pid = mysqli_real_escape_string($conn,$_REQUEST['pid']);
}else {
	header('location: index.php');
}

$conn = mysqli_connect("localhost","root","","delivery") or die("Couldn't connect to SQL server");
$getposts = mysqli_query($conn,"SELECT * FROM products WHERE pid ='$pid'") or die(mysqli_error("Couldn't connect"));
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$pid = $row['pid'];
						$pName = $row['pName'];
						$price = $row['price'];
						$picture = $row['strMealThumb'];
					}	
                    ?>




<?php
if (isset($_POST['addcart'])) {
	$getposts = mysqli_query($conn,"SELECT * FROM cart WHERE pid ='$pid' AND uid='$user'") or die(mysqli_error('Couldn\'t connect'));
	if (mysqli_num_rows($getposts)) {
		header('location: mycart.php?uid='.$user.'');
	}else{
		if(mysqli_query($conn,"INSERT INTO cart (uid,pid,quantity) VALUES ('$user','$pid', 1)")){
			header('location: mycart.php?uid='.$user.'');
		}else{
			header('location: index.php');
		}
	}
}
?>


<?php 
    include("includes/header.php");
?>
	<div class="product-view-container">

		
			
				
				<div>
					<img src="<?php echo $picture?>" style=" max-width: 500px;">
				</div>
				
				<div style="color: #067165;padding: 10px;max-width:500px;">
					<div>
						<h3 style="font-size: 25px; font-weight: bold; "><?php echo $pName?> </h3>
						<p style="font-size: 20px;">Price: Rs.<?php echo $price?></p>
                        <h5 style="font-size: 22px; ">Description:</h5>
                        <p>Lorem ipsum dolor sit amet, eu meis hendrerit duo, eu ius tation sanctus albucius. Enim doctus ius ne, et porro fugit consetetur nam. Ut sea albucius omittantur. Ut vel habeo augue nonumy, ne melius fabulas constituam cum. Est te consequat torquatos, sed consul periculis maiestatis et, volumus corpora vel in.
                        </p>

						<div>
							<p style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </p>
							<div>
								<form id="" method="post" action="">
								        <input type="submit" name="addcart" value="Add to cart" class="btn btn-dark" >
								</form><br/>
							</div>
						</div>

					</div>
				</div>

		
		

	</div>
<?php 
    include("includes/footer.php");
?>