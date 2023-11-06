<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <?php foreach ($products as $row) : ?>
        <div>
            <?php echo $row["productID"] ." "; ?>
            <?php echo $row["categoryID"] ." "; ?>
            <?php echo $row["productName"] ." "; ?>
            <?php echo $row["brand"] ." "; ?>
            <?php echo $row["stockQuantity"] ." "; ?>
            <?php echo $row["price"] ." "; ?>
            <?php echo $row["description"] ."<br>"; ?>
        </div>
    <?php endforeach; ?>
</body>
</html>