<?php

require_once 'DataAccess\DBconnector.php';

class LoginModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function loginUser($email, $password) {
        $statement = "SELECT * FROM User WHERE email = :email";
        echo $statement;
        $handle = $this->db->db->prepare($statement);
        $handle->bindParam(':email', $email);
        $handle->execute();
        $user = $handle->fetch(PDO::FETCH_ASSOC);
        var_dump($user);
       
        if ($user && password_verify($password, $user['passwords'])) {
            // Password is correct, return the user data
            
            return $user;
        } else {
            // Invalid login credentials
            return false;
        }
    }
}