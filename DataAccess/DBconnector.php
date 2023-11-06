<?php

require_once 'constants.php';
class DBConnector {
    private $db;

    function __construct() {
        try {
            $this->db = new PDO(DSN, DB_USER, DB_PASS);
        } catch (PDOException $err) {
            echo 'Connection Failed!: ' . $err->getMessage();
            $this->db = null;
        }
    }

    function getConnection() {
        return $this->db;
    }

    function closeConnection() {
        $this->db = null;
    }
}

?>