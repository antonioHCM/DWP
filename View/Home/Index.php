<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="View/Home/styles.css">
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
    <form method="post">
        <button type="submit" name="register" class="register-btn">Register</button>
</header>

<section class="hero">
    <h2>Welcome to Our Fruit Shop</h2>
    <p>Discover Fresh and Delicious Fruits</p>
</section>

<div id="product-container">
    <h2>Try Some of Our Pits, Register to See More...</h2>
    <div class="featured-products-container">
        <?php
        require_once 'Controller/ProductController.php';

        if (isset($_POST['register'])) {
            // Redirect to the register page
            header("Location: /register");
            exit();
        }

        $controller = new ProductController();
        $featuredProducts = $controller->getFeaturedProducts();
        $controller->closeConnection();

        foreach ($featuredProducts as $product) {
            echo '<div class="product">';
            echo '<img src="' . $product['img'] . '" alt="' . $product['productName'] . '">';
            echo '<h3>' . $product['productName'] . '</h3>';
            echo '<p class="category">Category: ' . $product['categoryName'] . '</p>';
            echo '<p class="brand">Brand: ' . $product['brand'] . '</p>';
            echo '<p class="stock">Stock Quantity: ' . $product['stockQuantity'] . '</p>';
            echo '<p class="price">Price: $' . $product['price'] . '</p>';
            echo '<p class="description">' . $product['description'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2023 Fruit Shop</p>
</footer>

</body>
</html>