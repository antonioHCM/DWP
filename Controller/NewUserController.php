<?php
require_once 'Model/NewUserModel.php'; 

class NewUserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new NewUserModel($db); 
    }

    public function registerUser($postalCode, $firstName, $lastName, $password, $email, $admin) {
        try {
            return $this->userModel->createUser($postalCode, $firstName, $lastName, $password, $email, $admin);
        } catch (PDOException $e) {
            // Handle database errors (e.g., connection issues, SQL errors)
            echo 'Registration failed due to a database error: ' . $e->getMessage();
            return false;
        } catch (Exception $e) {
            // Handle other exceptions (if any)
            echo 'Registration failed due to an unexpected error: ' . $e->getMessage();
            return false;
        }
    }
   public function submitUser() {

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postalCode = $_POST['postalCode'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];

        $registrationResult = $this->registerUser($postalCode, $firstName, $lastName, $password, $email, $admin);

        if ($registrationResult) {
            echo "Registration successful!";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
    }
}
?>