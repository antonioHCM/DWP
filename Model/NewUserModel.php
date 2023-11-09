<?php

require_once 'DataAccess\DBconnector.php';
class NewUserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($firstName, $lastName, $passwords, $email, $admin) {
        $statement = "INSERT INTO User (firstName, lastName, passwords, email, admin) VALUES (:firstname, :lastname, :passwords, :email, :admin)";
        $handle = $this->db->db->prepare($statement);
    
        // Bind parameters
        $handle->bindParam(':firstname', $firstName);
        $handle->bindParam(':lastname', $lastName);
        $handle->bindParam(':passwords', $passwords);
        $handle->bindParam(':email', $email);
        $handle->bindParam(':admin', $admin);
    
        // Execute the statement
        return $handle->execute();
    }
}    