<?php

require_once 'Model/ShoppingCartModel.php';
require_once 'Model/SessionHandle.php'; 

class ShoppingCartController {
    
    private $model;

    public function __construct($db) {
        $this->model = new ShoppingCartModel($db); 
    }

    public function addToCart($productID, $quantity) {
        $session = new SessionHandle();
        if (!$session->logged_in()) {
            // Redirect or handle not logged in case
            // For example, redirect to login page
            $redirect = new Redirector("/login");
        }

        // Assuming you have a method to get the user's cart ID, modify this as needed
        $userID = $_SESSION['user']['userID'];
        $cartID = $this->getOrCreateCart($userID);
        $this->addOrUpdateCart($cartID, $productID, $quantity);
    }

    public function getCartItems() {
        $session = new SessionHandle();
        if (!$session->logged_in()) {
            // Redirect or handle not logged in case
            // For example, redirect to login page
            
            $redirect = new Redirector("/login");
        }

        // Assuming you have a method to get the user's cart ID, modify this as needed
        $userID = $_SESSION['user']['userID'];
        $cartID = $this->getOrCreateCart($userID);

        
        return $this->model->getCartItems($cartID);
    }
    private function getOrCreateCart($userID) {
    $cartID = $this->model->getUserCartId($userID);
    if ($cartID == false) {
        $cartID = $this->model->createUserCart($userID);
    }
    return $cartID;
    }

    private function addOrUpdateCart($cartID,$productID,$quantity){
        $quantityOfProduct = $this->model->productExists($cartID,$productID);
        if($quantityOfProduct == false) {
        $this->model->addToCart($cartID, $productID, $quantity);
        }
        else{
            $this->model->updateCartItem($cartID, $productID, $quantityOfProduct + $quantity);
        }
    }

    public function deleteItem($cartItemID) {
        $this->model->deleteCartItem($cartItemID);
        
    }

    function closeConnection() {
        $this->model->closeConnection();
    }
}
?>
