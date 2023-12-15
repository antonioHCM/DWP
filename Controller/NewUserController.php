<?php
require_once __DIR__.'/../Model/NewUserModel.php'; 

class NewUserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new NewUserModel($db); 
    }

    public function registerUser($firstName, $lastName, $password, $email, $city, $street, $country, $admin) {
        try {
            return $this->userModel->createUser($firstName, $lastName, $password, $email, $city, $street, $country, $admin);
        } catch (PDOException $e) {
            //Database errors 
            echo 'Registration failed due to a database error: ' . $e->getMessage();
            return false;
        } catch (Exception $e) {
            //Other exceptions 
            echo 'Registration failed due to an unexpected error: ' . $e->getMessage();
            return false;
        }
    }
   public function submitUser() {

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $country = $_POST['country'];
        $admin = $_POST['admin'];

        $registrationResult = $this->registerUser($firstName, $lastName, $password, $email, $city, $street, $country, $admin);

        if ($registrationResult) {
            header("Location: /login");
            echo "Registration successful!";
            
            exit();
        } else {
            echo "Registration failed. Please try again.";
        }
    }
    }
}
?>