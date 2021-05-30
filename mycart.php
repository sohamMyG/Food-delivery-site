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
    $ulast_db=$get_user_email['lastName'];
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

if (isset($_REQUEST['cid'])) {
		$cid = mysqli_real_escape_string($conn,$_REQUEST['cid']);
		if(mysqli_query($conn,"DELETE FROM orders WHERE pid='$cid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}

$search_value = "";


//order

if (isset($_POST['order'])) {
$mbl = $_POST['mobile'];
$addr = $_POST['address'];

//triming name
try {
    if(empty($_POST['mobile'])) {
        throw new Exception('Mobile can not be empty');
        
    }
    if(empty($_POST['address'])) {
        throw new Exception('Address can not be empty');
        
    }	
						$d = date("Y-m-d"); //Year - Month - Day
						
						
						$msg = "";
					
						$result = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$user'");
						$t = mysqli_num_rows($result);
						if($t <= 0) {
							throw new Exception('No product in cart. Add product first.');
							
						}
						while ($get_p = mysqli_fetch_assoc($result)) {
							$num = $get_p['quantity'];
							$pid = $get_p['pid'];

							mysqli_query($conn,"INSERT INTO orders (uid,pid,quantity,oplace,mobile,odate) VALUES ('$user','$pid',$num,'$_POST[address]','$_POST[mobile]','$d')");
						}
							
						if(mysqli_query($conn,"DELETE FROM cart WHERE uid='$user'")){

							//success message
							
						$success_message = '
						<p>Order Successful !</p>
						';
							
						}
						

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}

?>

<?php 
    include("includes/header.php");
?>



<div class="flex-container" style="align-items:start;">
<div style="width:700px"> <h2 class="text-center" style="margin-top:3.5rem;">Cart</h2>
    <table class="table cart text-center" style="margin-top:1rem; ">
        <tr style="font-weight: bold;background-color:#3A5487" class="table-primary">
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>View</th>
            <th>Remove</th>
        </tr>
        <tr>
            <?php 
            $query = "SELECT * FROM cart WHERE uid=".$user;
            $run = mysqli_query($conn,$query);
            $total = 0;
            while ($row=mysqli_fetch_assoc($run)) {
                $pid = $row['pid'];
                $quantity = $row['quantity'];
                $query1 = "SELECT * FROM products WHERE pid={$pid}";
                $run1 = mysqli_query($conn,$query1);
                $row1=mysqli_fetch_assoc($run1);
                $pId = $row1['pid'];
                $pName = substr($row1['pName'], 0,50);
                $price = $row1['price'];
                $picture = $row1['strMealThumb'];
                $total += ($quantity*$price);
                $_SESSION['total'] = $total;
                ?>
            <td><?php echo $pName; ?></td>
            <td><?php echo $price; ?></td>
            <td><?php echo '<a href="update_cart.php?sid='.$pId.'" class="button">-</a>' ?><?php echo $quantity; ?><?php echo '<a href="update_cart.php?aid='.$pId.'" class="button">+</a>' ?></td>
            
            <td><?php echo '<div><a href="view_product.php?pid='.$pId.'">
                            <img src="'.$picture.'" style="height: 75px; width: 75px;">
                            </a>
                        </div>' ?></td>
            <td><?php echo '<div><a href="update_cart.php?cid='.$pId.'" style="text-decoration: none;">X</a>
                        </div>' ?></td>
        </tr>
        <?php } ?>
        <tr style="font-weight: bold;">
            <th>Total</th>
            <th></th>
            <th>Rs.<?php echo $total ?> </th>
            <th></th>
            <th></th>
        </tr>
    </table>
    </div>
						
		<div style="padding:3rem 5rem;" >
		        <?php 
				if(isset($success_message)) {echo $success_message;

										echo '<h3 style="color:#169E8F;"> Order Details </h3>';


							$user = $_SESSION['user_login'];
		        $result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
			    $get_user_email = mysqli_fetch_assoc($result);
				$uname_db = $get_user_email['firstName'];
				$ulast_db=$get_user_email['lastName'];
				$uemail_db = $get_user_email['email'];
				$umob_db = $get_user_email['mobile'];
                $uadd_db = $get_user_email['address'];
                ?>


            	<p style="font-size:25px;"> First Name: <?php echo $uname_db;?>  </p>';
				<p style="font-size:25px;"> Last Name: <?php echo $ulast_db;?></p>';
				<p style="font-size:25px;"> Email: <?php echo $uemail_db;?></p>'; 
				<p style="font-size:25px;"> Contact Number: <?php echo $umob_db;?> </p>';
				<p style="font-size:25px;"> Delivery Address: <?php echo $uadd_db;?></p>';	
				<p style="color:#169E8F;font-size:35px;"> Order Total: Rs. <?php echo $_SESSION['total'];?></p>;
				

				<?php		}
						else {
						?>
							
							
                    <form action="" method="POST" class='sign-up-form' style="height:800px;">
                        <h3 style="padding: 5px;">Delivery Details</h3>		
                        <label for="fullname">First Name:<br><input name="fullname" placeholder="your name" required="required" class="email signupbox" type="text" size="30" value="<?php echo $uname_db ?>"></label>
                        <label for="lastname">Last Name:<br><input name="lastname" placeholder="Your last name" required="required" class="email signupbox" type="text" size="30" value="<?php echo $ulast_db ?>"></label>
                        <label for="mobile">Mobile Number:<br><input name="mobile" placeholder="Your mobile number" required="required" class="email signupbox" type="text" size="30" value="<?php echo $umob_db ?>"></label>
                        <label for="address">Address:<br><input name="address" id="password-1" required="required"  placeholder="Write your full address" class="password signupbox " type="text" size="30" value="<?php echo $uadd_db ?>"></label>



                         <h3>Enter Card Details</h3>
                        <label for="ccname"> Name on the card: <br> <INPUT name="ccname" type="TEXT" placeholder="Enter the name on the card" size="25" id="ccname"></label>
                        <label for="ccnum">Card Number:<br> <INPUT name="ccnum" type="TEXT" placeholder="enter your 16-digit card number" size="30" maxlength="30" id="ccnum"></label>  
                        <div><label for="expdate">Expiration Date:<INPUT name="expdate" type="TEXT" placeholder="MM/YYYY" size="7" maxlength="30" id="expdate" style="width:80px;"></label>     
                        <label for="cvv">CVV:<INPUT name="cvv" type="TEXT" placeholder="XXX" size="3" maxlength="30" id="cvv" style="width:40px;"></label></div>
                        
                            <div>
                                <input onclick="myFunction()" name="order" type="submit" value="Confirm Order">
                            </div>
                            <div class="signup_error_msg"> 
                                <?php 
                                    if (isset($error_message)) {echo $error_message;}
                                    
                                ?>
                            </div>
                    
                    </form>
                    
                </div>
            </div>

                        <?php

						}

					 ?>
					
					</div>

				</div>

<?php 
    include("includes/footer.php");
?>