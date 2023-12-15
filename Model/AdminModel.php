<?php
require_once __DIR__.'/../DataAccess/DBconnector.php';
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

    public function getInfo() {
        $query = 'SELECT * FROM Information';
        $statement = $this->db->prepare($query);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setInfo($infoID, $content) {
        $query = 'UPDATE Information SET content = :content WHERE infoID = :infoID';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':content', $content, PDO::PARAM_STR);
        $statement->bindParam(':infoID', $infoID, PDO::PARAM_STR);

        $statement->execute();

    }

    public function getInfoById($infoID){
        $query = 'SELECT content FROM Information 
        WHERE infoID = :infoID';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':infoID', $infoID, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function closeConnection() {
        $this->db = null;
    }

    
    
}

?>