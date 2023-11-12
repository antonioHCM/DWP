
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Fruit Shop</h1>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Category ID</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Stock Quantity</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row) : ?>
                <tr>
                    <td><?php echo $row["productID"]; ?></td>
                    <td><?php echo $row["categoryID"]; ?></td>
                    <td><?php echo $row["productName"]; ?></td>
                    <td><?php echo $row["brand"]; ?></td>
                    <td><?php echo $row["stockQuantity"]; ?></td>
                    <td><?php echo '$' . number_format($row["price"], 2); ?></td>
                    <td><?php echo $row["description"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>