<?php

require_once __DIR__.'/../DataAccess/DBconnector.php';

class ShoppingCartModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($cartId, $productId, $quantity) {
        // Fetch product details based on $productId
        $product = $this->getProductById($productId);

        // Add the product to the cart
        $this->createCartItem($cartId, $productId, $quantity);

        // Set variables for the view
        $productQuantity = $quantity;

        
    }

    public function getCartItems($cartId) {
        $statement = "SELECT c.cartItemID, p.productName, p.price, c.quantity, p.img 
        FROM CartItem c 
        JOIN Product p ON c.productID = p.productID 
        WHERE c.cartID = :cartID";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':cartID', $cartId);
        $handle->execute();

        return $handle->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getProductById($productId) {
        $statement = "SELECT productName, brand, price FROM Product WHERE productID = :productId";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':productId', $productId);
        $handle->execute();

        return $handle->fetch(PDO::FETCH_ASSOC);
    }

    // Modify this function based on how you get the user's cart ID
    public function getUserCartId($userId) {
        $statement = "SELECT cartID FROM ShoppingCart WHERE userID = :userId";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':userId', $userId);
        $handle->execute();

        return $handle->fetchColumn();
    }

    public function createCartItem($cartId, $productId, $quantity) {
        $statement = "INSERT INTO CartItem (cartID, productID, quantity) VALUES (:cartID, :productID, :quantity)";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':cartID', $cartId);
        $handle->bindParam(':productID', $productId);
        $handle->bindParam(':quantity', $quantity);
        $handle->execute();
    }

    public function createUserCart($userID){
        $statement = "INSERT INTO ShoppingCart (userID) VALUES (:userID)";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':userID', $userID);
        if ($handle->execute()){
            return $this->db->lastInsertId();
        }
        else{
            return false;
        }
    }

    public function productExists($cartID, $productID){
        $statement = "SELECT * FROM CartItem WHERE cartID = :cartID
        AND productID = :productID";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':cartID', $cartID);
        $handle->bindParam(':productID', $productID);
        $handle->execute();

        return $handle->fetchColumn(3);
    }

    public function updateCartItem($cartID, $productID, $quantity) {
        $statement = "UPDATE CartItem SET quantity = :quantity
        WHERE cartID = :cartID
        AND productID = :productID";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':cartID', $cartID);
        $handle->bindParam(':productID', $productID);
        $handle->bindParam(':quantity', $quantity);
        $handle->execute();
    }

    public function deleteCartItem ($cartItemID) {
        $statement = "DELETE FROM CartItem WHERE cartItemID = :cartItemID";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':cartItemID', $cartItemID);
        $handle->execute();
    }

    function closeConnection() {
        $this->db = null;
    }
}
?>
