<?php

require_once 'DataAccess\DBconnector.php';

class ProductModel {
    private $db;

    function __construct() {
        $dbConnector = new DBConnector();
        $this->db = $dbConnector->getConnection();
    }

    function getProducts() {
        if ($this->db !== null) {
            $query = 'SELECT * FROM Product';
            $statement = $this->db->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }

    function closeConnection() {
        $this->db = null;
    }
}

?>