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
    echo '<button class="buy-btn">Add to Cart</button>';
    echo '</div>';
}
?>

</div>

</body>
</html>