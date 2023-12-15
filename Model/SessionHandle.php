<?php

require_once __DIR__.'/../Model/Redirector.php';

class SessionHandle {
    public function __construct() {
        if(session_status() !== PHP_SESSION_ACTIVE)
         session_start();
    }

    public function logged_in() {
        return isset($_SESSION['user_ID']); 
    }

    public function confirm_logged_in() {
        if (!$this->logged_in()) {
            $redirect = new Redirector("/login");
            exit;
        }
    }

    public function logOut() {
        session_destroy();
        $redirect = new Redirector("/");
    }
}