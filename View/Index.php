<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Fruit Shop</title>
    <!-- Add any necessary styles or link to a CSS file here -->
    <style>
        /* Add your styles for the navigation bar here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="contact">Contact</a>
    <a href="aboutus">About Us</a>
    <a href="login">Login</a>
    <a href="register">Register</a>
</nav>

<!-- Your content goes here -->

<?php
require_once 'Controller/ProductController.php';

$controller = new ProductController();
$controller->displayProducts();
$controller->closeConnection();
?>

</body>
</html>