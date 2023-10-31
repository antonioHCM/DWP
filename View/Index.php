Index
<?php

require_once __DIR__.'/../DataAccess/DBconnector.php';

$query = "SELECT * FROM Product";

$res = $db->query($query,   PDO::FETCH_ASSOC);

foreach ($res as $row) {
    echo $row["productID"] ." ";
    echo $row["categoryID"] ." ";
    echo $row["productName"] ." ";
    echo $row["brand"] ." ";
    echo $row["stockQuantity"] ." ";
    echo $row["price"] ." ";
    echo $row["description"] ."<br>";
}
?>