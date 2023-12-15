<?php

require_once __DIR__."/../Model/ProductModel.php";

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

    function updateProduct ($productID, $categoryID, $productName, $brand, $stockQuantity, $price, $description, $img){
        $this->model->updateProduct($productID, $categoryID, $productName, $brand, $stockQuantity, $price, $description, $img);
    }

    public function deleteProduct($productId){
        $this->model->deleteProduct($productId);
    }
    
    public function createProduct($categoryID, $productName, $brand, $stockQuantity, $price, $description, $img){
        $this->model->createProduct($categoryID, $productName, $brand, $stockQuantity, $price, $description, $img);
        
    }

    function closeConnection() {
        $this->model->closeConnection();
    }

    
}

?>