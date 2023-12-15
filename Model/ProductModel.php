<?php

require_once __DIR__.'/../DataAccess/DBconnector.php';

class ProductModel {
    private $db;

    function __construct() {
        $dbConnector = new DBConnector();
        $this->db = $dbConnector->getConnection();
    }

    function getProducts() {
        if ($this->db !== null) {
            $query = 'SELECT Product.productID, Product.categoryID, Category.categoryName, Product.productName, Product.brand, Product.stockQuantity, Product.price, Product.description, Product.img
                FROM Product
                JOIN Category ON Product.categoryID = Category.categoryID';
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function updateProduct($productID, $categoryID, $productName, $brand, $stockQuantity, $price, $description, $img) {
        $query = 'UPDATE Product SET categoryID = :categoryID, productName = :productName, brand = :brand, stockQuantity = :stockQuantity, price = :price, description = :description, img = :img
        WHERE productID = :productID';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':productID', $productID, PDO::PARAM_INT);
        $statement->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
        $statement->bindParam(':productName', $productName, PDO::PARAM_STR);
        $statement->bindParam(':brand', $brand, PDO::PARAM_STR);
        $statement->bindParam(':stockQuantity', $stockQuantity, PDO::PARAM_INT);
        $statement->bindParam(':price', $price, PDO::PARAM_INT);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':img', $img, PDO::PARAM_STR);

        $statement->execute();
    }

    public function deleteProduct($productId) {
        $query = 'DELETE FROM Product WHERE productID = :productID';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':productID', $productId, PDO::PARAM_INT);

        $statement->execute();
    }

    public function createProduct($categoryID, $productName, $brand, $stockQuantity, $price, $description, $img) {
        $query = 'INSERT INTO Product(categoryID, productName, brand, stockQuantity, price, description, img) 
        values (:categoryID, :productName, :brand, :stockQuantity, :price, :description, :img)';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
        $statement->bindParam(':productName', $productName, PDO::PARAM_STR);
        $statement->bindParam(':brand', $brand, PDO::PARAM_STR);
        $statement->bindParam(':stockQuantity', $stockQuantity, PDO::PARAM_INT);
        $statement->bindParam(':price', $price, PDO::PARAM_INT);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':img', $img, PDO::PARAM_STR);

        $statement->execute();
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