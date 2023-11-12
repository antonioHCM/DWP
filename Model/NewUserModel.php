<?php

require_once 'DataAccess\DBconnector.php';

class NewUserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($firstName, $lastName, $password, $email, $admin) {
        
        // Hash the password
        $iterations = ['cost' => 15];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $iterations);

        $statement = "INSERT INTO User (firstName, lastName, passwords, email, admin) VALUES (:firstname, :lastname, :passwords, :email, :admin)";
        $handle = $this->db->db->prepare($statement);

        // Bind params
        $handle->bindParam(':firstname', $firstName);
        $handle->bindParam(':lastname', $lastName);
        $handle->bindParam(':passwords', $hashedPassword); 
        $handle->bindParam(':email', $email);
        $handle->bindParam(':admin', $admin);

        // Execute the statement
        return $handle->execute();
    }
}