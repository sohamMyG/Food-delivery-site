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

if (isset($_GET['keywords'])) {

	$keywords = mysqli_real_escape_string($conn,$_GET['keywords']);
	if($keywords != "" && ctype_alnum($keywords)){
		
	}else {
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

$search_value = "";
$search_value = trim($_GET['keywords']);
require_once("includes/header.php");

?>


		<?php 
			if (isset($_GET['keywords']) && $_GET['keywords'] != ""){
				$search_value = trim($_GET['keywords']);
                $getposts = mysqli_query($conn,"SELECT * FROM products WHERE pName like '%".$search_value."%'  ORDER BY pid DESC") ;
                
				if ( $total = mysqli_num_rows($getposts)) {
					
					echo '<div style="text-align: center;margin-top:2rem;">  Products Found: '.$total.'</div><br>';
					echo '<ul style="display: flex;
                        justify-content: center;
                        flex-wrap: wrap;padding:0;">';

                    while ($row = mysqli_fetch_assoc($getposts)) {
                        $id = $row['pid'];
                        $pName = $row['pName'];
                        $price = $row['price'];
                        $category = $row['category'];
                        $picture = $row['strMealThumb'];
                        ?> 
                            <ul class="product-container">
                                <li>
                                    <a href="view_product.php?pid=<?php echo $id ?>">
                                        <img src="<?php echo $picture ?>" style="width:15rem;">
                                        
                                        <div class="text-center p-3 bg-dark text-light"> <span style="font-size: 15px;"><?php echo $pName ?></span><br> Price: Rs.<?php echo $price ?> </div>
                                    </a>
                                    
                                </li>
                            </ul>
            <?php

            }
				}else {
				echo "Nothing Found!";
			}
			}else {
				echo "Input Someting...";
			}
			
		?>




<?php include("includes/footer.php"); ?>			