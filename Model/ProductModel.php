<?php

require_once 'DataAccess\DBconnector.php';

class ProductModel {
    private $db;

    function __construct() {
        $dbConnector = new DBConnector();
        $this->db = $dbConnector->getConnection();
    }

    function getProducts() {
        if ($this->db !== null) {
            $query = 'SELECT Product.productID, Category.categoryName, Product.productName, Product.brand, Product.stockQuantity, Product.price, Product.description, Product.img
                FROM Product
                JOIN Category ON Product.categoryID = Category.categoryID';
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }
    function getProductById($productId) {
        if ($this->db !== null) {
            $query = 'SELECT Product.productID, Category.categoryName, Product.productName, Product.brand, Product.stockQuantity, Product.price, Product.description, Product.img
                FROM Product
                JOIN Category ON Product.categoryID = Category.categoryID
                WHERE Product.productID = :productId';
            $statement = $this->db->prepare($query);
            $statement->bindParam(':productId', $productId, PDO::PARAM_INT);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    function getFeaturedProducts() {
        if ($this->db !== null) {
            $query = 'SELECT Product.productID, Category.categoryName, Product.productName, Product.brand, Product.stockQuantity, Product.price, Product.description, Product.img
                FROM Product
                JOIN Category ON Product.categoryID = Category.categoryID
                WHERE Category.featuredCategory = 1
                LIMIT 2';
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }
    
    function closeConnection() {
        $this->db = null;
    }
}

?>