<?php

require_once 'Model/AdminModel.php';

class AdminController {
    private $model;

    public function __construct($db) {
        $this->model = new AdminModel($db);
    }

    public function getFeaturedCategory() {
        $this->model->getFeaturedCategory();
    }

    public function setFeaturedCategory($categoryID) {
        $this->model->setFeaturedCategory($categoryID);
    }
}


?>