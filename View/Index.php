Index
<?php

var_dump(__DIR__);

require_once 'Controller/ProductController.php';

$controller = new ProductController();
$controller->displayProducts();
$controller->closeConnection();


?>