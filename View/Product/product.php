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

<div id="product-container" class="product-container">

    <?php
    require_once 'Controller/ProductController.php';

    $controller = new ProductController();
    $products = $controller->getProducts();
    $controller->closeConnection();

    foreach ($products as $product) {
        echo '<div class="product">';
        echo '<img src="' . $product['img'] . '" alt="' . $product['productName'] . '">';
        echo '<h2>' . $product['productName'] . '</h2>';
        echo '<p class="category">Category: ' . $product['categoryName'] . '</p>';
        echo '<p class="brand">Brand: ' . $product['brand'] . '</p>';
        echo '<p class="stock">Stock Quantity: ' . $product['stockQuantity'] . '</p>';
        echo '<p class="price">Price: $' . $product['price'] . '</p>';
        echo '<p class="description">' . $product['description'] . '</p>';
        // Add to Cart button
        echo '<form action="/add-to-cart" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $product['productID'] . '">';
        echo '<button type="submit" class="buy-btn">Add to Cart</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>

</div>

<!-- View Cart Link -->
<div class="view-cart-link">
    <a href="/view-cart">View Cart</a>
</div>

</body>
</html>
