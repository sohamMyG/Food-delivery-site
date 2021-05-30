<?php 
    session_start();
?>


<?php 
    include("includes/header.php");
?>


<h1 class="text-center pt-5">Menu</h1>
<h4 class="text-center p-2">Choose a Category:</h4>

<div class="category-container">
    <div>
        <img src="https://www.themealdb.com/images/media/meals/stpuws1511191310.jpg" alt="Starter">
        <h4 class="text-center">Starter</h4>
        <a href="products.php?cat=6" class="btn btn-primary">View Starters</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/utxryw1511721587.jpg" alt="Breakfast">
        <h4 class="text-center">Breakfast</h4>
        <a href="products.php?cat=9" class="btn btn-primary">View Dishes</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/tvtxpq1511464705.jpg" alt="Vegetarian">
        <h4 class="text-center">Vegetarian</h4>
        <a href="products.php?cat=8" class="btn btn-primary">View Dishes</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/1520081754.jpg" alt="Vegan">
        <h4 class="text-center">Vegan</h4>
        <a href="products.php?cat=7" class="btn btn-primary">View Vegan Dishes</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/uquqtu1511178042.jpg" alt="Pasta">
        <h4 class="text-center">Pasta</h4>
        <a href="products.php?cat=4" class="btn btn-primary">View Pastas</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/qywups1511796761.jpg" alt="Sides">
        <h4 class="text-center">Sides</h4>
        <a href="products.php?cat=10" class="btn btn-primary">View Sides</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/1529444113.jpg" alt="Chicken">
        <h4 class="text-center">Chicken</h4>
        <a href="products.php?cat=1" class="btn btn-primary">Chicken Dishes</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/1548772327.jpg" alt="Seafood">
        <h4 class="text-center">Seafood</h4>
        <a href="products.php?cat=5" class="btn btn-primary">Seafood Dishes</a>
    </div>
    <div>
        <img src="https:\/\/www.themealdb.com\/images\/media\/meals\/uttuxy1511382180.jpg" alt="dessert">
        <h4 class="text-center">Desserts</h4>
        <a href="products.php?cat=2" class="btn btn-primary">View Desserts</a>
    </div>
    
</div>


<?php 
    include("includes/footer.php");
?>

