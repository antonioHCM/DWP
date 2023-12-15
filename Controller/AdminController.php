<?php

require_once __DIR__.'/../Model/AdminModel.php';

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

    public function getInfo(){
        
       return $this->model->getInfo();
    }

    public function setInfo($infoID,$content) {
        return $this->model->setInfo($infoID, $content);
    }

    function getInfoByID($infoID) {
        $content = $this->model->getInfoByID($infoID);
        return $content;
    }
    public function closeConnection() {
        $this->model->closeConnection();
   }
}


?>