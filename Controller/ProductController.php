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

    function getFeaturedProducts() {
        return $this->model->getFeaturedProducts();
    }

    function displayProducts() {
        $products = $this->getProducts();
        require "View/Product/product.php";
    }

    function getProductById($productID) {
        $product = $this->model->getProductById($productID);
        return $product;
    }

    function closeConnection() {
        $this->model->closeConnection();
    }
}

?>