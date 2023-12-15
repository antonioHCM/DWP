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
    <title>Add to Cart</title>
    <link rel="stylesheet" href="/View/ShoppingCart/styles.css">
    <!-- Include your stylesheets and other head content here -->
</head>
<body>

<header>
    <h1>Fruit Shop</h1>
    <nav>
        <a href="/">Home</a>
        <a href="login">Login</a>
        <a href="register">Register</a>
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
            } 
            ?>
        </a>
    </nav>
</header>

<div id="add-to-cart-container" class="add-to-cart-container">
    <h2>Add to Cart</h2>
    <?php
 

    require_once __DIR__.'/../../Controller/ShoppingCartController.php';          
    require_once __DIR__.'/../../Controller/ProductController.php';

    if(!filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT))
    {
        die('nOPE');
    }

    $db = new DBConnector();    
    $controller = new ShoppingCartController($db);
    $controller->addToCart($_POST['product_id'], $_POST['quantity']);
    $controller->closeConnection();

    $controller = new ProductController();
    $product = $controller->getProductById($_POST['product_id']);
    $controller->closeConnection();


    // Check if $product is set and not null
    
    if (isset($product) && $product !== null) {
        echo '<div class="product-container">';
        echo '<p>Product added to cart:</p>';
        echo '<img src="' . $product['img'] . '" alt="Product Image">';
        echo '<p>Name: ' . htmlspecialchars($product['productName']) . '</p>';
        echo '<p>Brand: ' . htmlspecialchars($product['brand']) . '</p>';
        echo '<p>Price: $' . htmlspecialchars($product['price']) . '</p>';
        echo '<p>Quantity: ' . htmlspecialchars($_POST['quantity']) . '</p>';
        // Add more details as needed
        echo '</div>';
    } else {
        echo '<p>No product information available.</p>';
    }
    ?>
    <div class="button-container">
        <a href="/product" class="back-button">Back to Product Page</a>
        <a href="/view-cart" class="view-cart-button">View Cart</a>
    </div>
</div>

</body>
</html>
