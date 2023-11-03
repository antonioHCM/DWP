Index
<?php

require_once __DIR__.'/../DataAccess/DBconnector.php';

$db = connectToDatabase();

if ($db !== null) {

    $query = 'SELECT * FROM Product';
    $statement = $db->query($query);

    foreach ($statement as $row) {
        echo $row["productID"] ." ";
        echo $row["categoryID"] ." ";
        echo $row["productName"] ." ";
        echo $row["brand"] ." ";
        echo $row["stockQuantity"] ." ";
        echo $row["price"] ." ";
        echo $row["description"] ."<br>";
    }
    
} 
$db->dbClose();
?>