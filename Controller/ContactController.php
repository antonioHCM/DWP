<?php

require_once '/Model/ContactModel.php';
require_once 'View/Contact/contact.php';

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new ContactModel();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $this->model->sendEmail($name, $email, $message);
        }

        include 'View/Contact/confirmation.php';
    }
}

$contactController = new ContactController();
$contactController->index();
?>