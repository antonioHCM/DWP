<?php

require_once __DIR__.'/../DataAccess/DBconnector.php';

class LoginModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
        session_start();
    }

    public function loginUser($email, $password) {
        $statement = "SELECT * FROM User WHERE email = :email";
        $handle = $this->db->prepare($statement);
        $handle->bindParam(':email', $email);
        $handle->execute();
        $user = $handle->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['passwords'])) {
            // Correct match
            $_SESSION['user_ID'] = $user['userID'];
            $_SESSION['user'] = $user;
            
            
            return $user;
        } else {
            // Invalid login credentials
            return false;
        }
    }
}