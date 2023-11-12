Index
<?php


require_once 'Controller/ProductController.php';

$controller = new ProductController();
$controller->displayProducts();
$controller->closeConnection();


?>

<a href="register">Register</a>