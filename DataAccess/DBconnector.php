<?php

require_once 'constants.php';
class DBConnector {
    public $db;

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
    function prepare($statement) {
        return $this->db->prepare($statement);
    }

    function lastInsertId() {
        return $this->db->lastInsertId();
    }
}

?>