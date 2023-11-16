<?php

require_once 'DataAccess\DBconnector.php';

class LoginModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
        session_start();
    }

    public function loginUser($email, $password) {
        $statement = "SELECT * FROM User WHERE email = :email";
        $handle = $this->db->db->prepare($statement);
        $handle->bindParam(':email', $email);
        $handle->execute();
        $user = $handle->fetch(PDO::FETCH_ASSOC);
        
       
        if ($user && password_verify($password, $user['passwords'])) {
            // Password is correct, return the user data
            if (isset($user['id'])) {
                $_SESSION['user_id'] = $user['id'];
            }
            if (isset($user['user'])) {
                $_SESSION['user'] = $user['user'];
            }
            return $user;
        } else {
            // Invalid login credentials
            
            return false;
        }
    }
}