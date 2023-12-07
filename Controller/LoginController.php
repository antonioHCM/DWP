<?php
require_once 'Model/LoginModel.php'; 
require_once 'Model/Redirector.php'; 
class LoginController {
    private $loginModel;

    public function __construct($db) {
        $this->loginModel = new LoginModel($db); 
    }

    public function loginUser($email, $password) {
        try {
            $userData = $this->loginModel->loginUser($email, $password);

            if ($userData) {
                // Login successful
                echo "You are logged in!";
                $redirect = new Redirector("/product");
                return $userData;
                
            } else {
                echo "Login failed. Please check your credentials and try again.";
               
                return false;
            }
            
        } catch (PDOException $e) {
            // Database errors 
            echo 'Login failed due to a database error: ' . $e->getMessage();
            return false;
        } catch (Exception $e) {
            // Other exceptions 
            echo 'Login failed due to an unexpected error: ' . $e->getMessage();
            return false;
        }
        
    }

    public function submitLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            
            return $loginResult = $this->loginUser($email, $password);
    
            
        }
    }
}
