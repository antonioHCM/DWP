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
    <title>View Cart</title>
    <link rel="stylesheet" href="/View/ShoppingCart/styles.css">
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

<div id="view-cart-container" class="view-cart-container">
    <h2>Your Shopping Cart</h2>
    <?php
    require_once __DIR__.'/../../Controller/ShoppingCartController.php';
    
    

    
    $db = new DBConnector();
    $shoppingCart = new ShoppingCartController($db);
    

    if(isseT($_POST['cartItemID'])) {
    $shoppingCart->deleteItem($_POST['cartItemID']);
    }
    
    $cartItems = $shoppingCart->getCartItems();
    
    if (!empty($cartItems)) {
        // Display the contents of the shopping cart
        foreach ($cartItems as $cartItem) {
            echo '<div class="cart-item">';
            echo '<img src="' . $cartItem['img'] . '" alt="Product Image">';
            echo '<p>Product: ' . htmlspecialchars($cartItem['productName']) . '</p>';
            echo '<p>Price: $' . htmlspecialchars($cartItem['price']) . '</p>';
            echo '<p>Quantity: ' . htmlspecialchars($cartItem['quantity']) . '</p>';
            
            
        
            // Cancel button for each product
            echo '<form method="post" action="/view-cart">';
            echo '<input type="hidden" name="cartItemID" value="' . htmlspecialchars($cartItem['cartItemID']) . '">';
            echo '<input type="submit" value="Cancel">';
            echo '</form>';
           

            echo '</div>';
        }
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>
    <div class="button-container">
        <a href="/product" class="back-button">Back to Product Page</a>
        
    </div>
</div>

</body>
</html>
