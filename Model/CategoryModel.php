<?php
require_once __DIR__.'/../DataAccess/DBconnector.php';
class CategoryModel {
    
private $db;

public function __construct($db) {
    $this->db = $db;
}
public function getAllCategories(){
    $query = 'SELECT * FROM Category';
    $statement = $this->db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function closeConnection() {
    $this->db = null;
}
    
}


?>