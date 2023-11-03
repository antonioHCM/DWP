<?php

require ("constants.php");

	
	function connectToDatabase() {
		try {
			$db = new PDO(DSN, DB_USER, DB_PASS);
			return $db;
		} catch (PDOException $err) {
			echo 'Connection Failed!: ' . $err->getMessage();
			return null; // or handle the error in some other way
		}
	}
	 function dbClose() {
        $db = null;
    }

?>