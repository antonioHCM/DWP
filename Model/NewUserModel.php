<?php

require_once 'DataAccess\DBconnector.php';

class NewUserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($firstName, $lastName, $password, $email, $admin) {
        // Check if the email already exists
        if ($this->isEmailTaken($email)) {
            echo"Email is already in use.  ";
            return false;
        }

        // Hash the password
        $iterations = ['cost' => 15];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $iterations);

        $statement = "INSERT INTO User (firstName, lastName, passwords, email, admin) VALUES (:firstname, :lastname, :passwords, :email, :admin)";
        $handle = $this->db->prepare($statement);

        // Bind params
        $handle->bindParam(':firstname', $firstName);
        $handle->bindParam(':lastname', $lastName);
        $handle->bindParam(':passwords', $hashedPassword); 
        $handle->bindParam(':email', $email);
        $handle->bindParam(':admin', $admin);

        
        return $handle->execute();
    }

    
    private function isEmailTaken($email) {
        $statement = "SELECT COUNT(*) FROM User WHERE email = :email";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':email', $email);
        $handle->execute();

        // Fetch the count
        $count = $handle->fetchColumn();

        // If count is greater than 0, email is already taken
        return $count > 0;
    }
}