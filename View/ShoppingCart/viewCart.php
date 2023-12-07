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
        <a id="navUsername">
            <?php
            require_once 'Model/SessionHandle.php';
            $session = new SessionHandle();

            // Check if the user is logged in
            if ($session->logged_in()) {
                // Display user
                echo 'Welcome, ' . $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
            } else {
                $redirect = new Redirector("/login");
            }
            ?>
        </a>
    </nav>
</header>

<div id="view-cart-container" class="view-cart-container">
    <h2>Your Shopping Cart</h2>
    <?php
    require_once 'Controller/ShoppingCartController.php';
    
    $db = new DBConnector();
    $shoppingCart = new ShoppingCartController($db);
    $cartItems = $shoppingCart->getCartItems();
    
    if (!empty($cartItems)) {
        // Display the contents of the shopping cart
        foreach ($cartItems as $cartItem) {
            echo '<p>Product: ' . $cartItem['productName'] . '</p>';
            echo '<p>Price: $' . $cartItem['price'] . '</p>';
            echo '<p>Quantity: ' . $cartItem['quantity'] . '</p>';
            // Add more details as needed
        }
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>
</div>

</body>
</html>
