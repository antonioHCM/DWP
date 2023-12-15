<?php 
        require_once __DIR__.'/../../Model/SessionHandle.php';
        $session = new SessionHandle();
        
       if(!$session->logged_in()){
            $redirect = new Redirector("/login");
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="/View/Product/styles.css">
</head>
<body>

<header>
    <h1>Fruit Shop</h1>
    <nav>
        <a href="/">Home</a>
        <a href="login">Login</a>
        <a href="aboutus">About Us</a>
        <a href="contact">Contact</a>
        <?php
             if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] === '1') {
                echo '<a href="/adminPanel">Admin Panel</a>';
            }
            ?>
        <a id="navUsername">
            <?php

            if ($session->logged_in()) {
                // Display user
                echo 'Welcome, ' . $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
                echo ' <a href="/logout" class="logout-link">Logout</a>';
            } 
            ?>
        </a>
    </nav>
</header>
<div class="view-cart-link">
    <a href="/view-cart">View Cart</a>
</div>

<div id="product-container" class="product-container">

    <?php
    require_once __DIR__.'/../../Controller/ProductController.php';

    $controller = new ProductController();
    $products = $controller->getProducts();
    $controller->closeConnection();

    foreach ($products as $product) {
        echo '<div class="product">';
        echo '<img src="' . htmlspecialchars($product['img']) . '" alt="' . htmlspecialchars($product['productName']) . '">';
        echo '<h2>' . htmlspecialchars($product['productName']) . '</h2>';
        echo '<p class="category">Category: ' . htmlspecialchars($product['categoryName']) . '</p>';
        echo '<p class="brand">Brand: ' . htmlspecialchars($product['brand']) . '</p>';
        echo '<p class="stock">Stock Quantity: ' . htmlspecialchars($product['stockQuantity']) . '</p>';
        echo '<p class="price">Price: $' . htmlspecialchars($product['price']) . '</p>';
        echo '<p class="description">' . htmlspecialchars($product['description']) . '</p>';
        // Add to Cart button
        echo '<form action="/add-to-cart" method="post">';
        echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($product['productID']) . '">';
        echo '<input type="number" name="quantity" value="1">';
        echo '<button type="submit" class="buy-btn">Add to Cart</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>

</div>


</body>
</html>
