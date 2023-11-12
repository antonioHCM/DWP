<?php

require_once "Model/ProductModel.php";

class ProductController {
    private $model;

    function __construct() {
        $this->model = new ProductModel();
    }

    function getProducts() {
        return $this->model->getProducts();
    }

    function displayProducts() {
        $products = $this->getProducts();
        require "View/product.php";
    }

    function closeConnection() {
        $this->model->closeConnection();
    }
}

?>