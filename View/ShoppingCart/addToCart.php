<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
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

<div id="add-to-cart-container" class="add-to-cart-container">
    <h2>Add to Cart</h2>
    <?php
 

    require_once 'Controller/ShoppingCartController.php';          
    require_once 'Controller/ProductController.php';

    $db = new DBConnector();    
    $controller = new ShoppingCartController($db);
    $controller->addToCart($_POST['product_id'], 1);
    $controller->closeConnection();

    $controller = new ProductController();
    $product = $controller->getProductById($_POST['product_id']);
    $controller->closeConnection();


    // Check if $product is set and not null
    if (isset($product) && $product !== null) {
        echo '<p>Product added to cart:</p>';
        echo '<p>Name: ' . $product['productName'] . '</p>';
        echo '<p>Brand: ' . $product['brand'] . '</p>';
        echo '<p>Price: $' . $product['price'] . '</p>';
        echo '<p>Quantity: ' . $productQuantity . '</p>';
        // Add more details as needed
    } else {
        echo '<p>No product information available.</p>';
    }
    ?>
</div>

</body>
</html>
