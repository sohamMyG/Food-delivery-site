<?php include("inc/connect.inc.php"); ?>
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
   
?>

<?php 
    include("includes/header.php");
?>




<div class="flex-container profile-nav">
           <a href="products.php?cat=6" >Starters</a>
           <a href="products.php?cat=9" >Breakfast</a>
           <a href="products.php?cat=8">Vegetarian</a>
           <a href="products.php?cat=7" >Vegan</a>
           <a href="products.php?cat=4" >Pasta</a>
           <a href="products.php?cat=10" >Sides</a>
           <a href="products.php?cat=1" >Chicken</a>
           <a href="products.php?cat=5" >Seafood</a>
           <a href="products.php?cat=2" >Desserts</a>
</div>

<?php
     $conn = mysqli_connect("localhost","root","","delivery") or die("Couldn't connect to SQL server");
     if(isset($_GET['cat'])){
         $category = $_GET['cat'];
     }
     else{
         $category = "view-all";
     }
    $result = mysqli_query($conn,"SELECT * FROM products WHERE category={$category}");
    
    if (mysqli_num_rows($result)) {
        echo '<ul style="display: flex;
        justify-content: center;
        flex-wrap: wrap;padding:0;">';

        while ($row = mysqli_fetch_assoc($result)) {
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
    }
?>



<?php 
    include("includes/footer.php");
?>