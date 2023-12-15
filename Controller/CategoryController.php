<?php

require_once __DIR__.'/../Model/CategoryModel.php';

class CategoryControlller {
    private $model;

    public function __construct($db) {
        $this->model = new CategoryModel($db);
    }

    public function getAllCategories() {
        return $this->model->getAllCategories();
    }

    public function closeConnection() {
         $this->model->closeConnection();
    }
}


?>