<?php
session_start();
$products_file = file_get_contents("database/products.db");
$products = unserialize($products_file);
$categories_file = file_get_contents("database/categories.db");
$categories = unserialize($categories_file);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pleasers - Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/products.css" />
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=1" />
</head>

<body>
    <div class="top-div">
        <p class="top-txt">- Pleasers -</p>
        <p class="top-sub">Fabulous Shoes<p>
    </div>
    <ul style="top: 150px">
        <li><a href="index.php">Home</a></li>
        <?php foreach ($categories as $key => $subcats) {?>
        <li class="dropdown">
            <a href="products.php?cat=<?= $key?>" class="dropbtn"><?= $key?> <img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
            <?php foreach($subcats as $subcat) {?>
                <a href="products.php?cat=<?= $key?>&subcat=<?= $subcat?>"><?= $subcat?></a>
            <?php }?>
            </div>
        </li>
        <?php }?>
        <li class="dropdown" style="float:right">
            <a href="cart.php" class="dropbtn"><img src="img/bag.png" class="img-bag"></a>
        </li>
        <li class="dropdown" style="float:right">
            <a href="#" class="dropbtn">My Account<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
                <?php if ($_SESSION['logged_on_user'] == null) {?>
                <a href="register.php">Register</a>
                <a href="signin.php">Login</a>
                <?php
                } else {?>
                <a href="account.php">My Preferences</a>
                <a href="logout.php">Logout</a>
                <?php
                }
                ?>
            </div>
        </li>
        <li class="dropdown" style="float:right">
		    <form method="GET" action="search.php" class="dropbtn search-menu">
			    <input class="search-bar" type="text" name="search" placeholder="Search...">
                <button class="search-button" type="submit"><img class="img-loupe" src="img/loupe.png"></button>
		    </form>
	    </li>
    </ul>
    <div class="main">
        <div class="title">
            <p class="title-txt">• Results for "<?=$_GET['search']?>" •</p>
        </div>
        <?php
        foreach($products as $product) {
            if ($_GET['search'] != null && (strpos($product['name'], $_GET['search']) !== false || strpos($product['cat'], $_GET['search']) !== false || strpos($product['subcat'], $_GET['search']) !== false)) {
        ?>
                <div class="product">
                <div class="prod-img">
                    <img class="prod-pic" src="../resources/<? echo $product['img'];?>" alt="product preview pic">
                </div>
                <div class="prod-vbar"></div>
                <div class="prod-title">
                    <p class="prod-title-txt">-<?php echo $product['name'];?>-</p>
                </div>
                <p class="prod-desc-txt"><?php echo $product['desc'];?></p>
                <div class="prod-price">
                    <p class="prod-price-txt"><?php echo $product['price'];?> ZAR</p>
                </div>
                <div class="prod-hbar"></div>
                <div class="prod-size">
                    <form class="prod-size-form" action="manage_cart.php?<?= "action=add&name=" . $product['name'] . "&cat=" . $product['cat'] . "&subcat=" . $product['subcat'] . "&price=" . $product['price'] . "&img=" . $product['img'];?>" method="POST">
                        <select class="prod-size-form-select" name="size">
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="prod-size-form-button" type="submit">Add To Cart</button>
                    </form>
                </div>
            </div>
        <?php
            }
        }
        ?>
    </div>

</body>

</html>
