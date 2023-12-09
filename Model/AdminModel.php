<?php
require_once 'DataAccess\DBconnector.php';
class AdminModel{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function setFeaturedCategory($categoryID){
        $query = 'UPDATE Category SET featuredCategory = 0 ';
        $statement = $this->db->prepare($query);
        $statement->execute();

        $query = 'UPDATE Category SET featuredCategory = 1
        WHERE categoryID = :categoryID';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
        $statement->execute();
    }

    public function getFeaturedCategory(){
        $query = 'SELECT FROM Category WHERE featuredCategory = 1';
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchColumn();
    }
    
    
}

?>