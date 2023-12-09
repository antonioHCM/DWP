<?php
    require_once 'DataAccess/DBconnector.php'; 
    require_once 'Controller/NewUserController.php'; 

    if (isset($_POST)) {
        $db = new DBConnector();
        $controller = new NewUserController($db);
        $controller->submitUser();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/Register/styles.css">
    <title>Registration Page</title>
</head>
<body>
<header id="main-header">
        <a href="/"><h1>Fruit Shop</h1></a>
    </header>
    <h1>Registration Page</h1>

    <form action="register" method="post">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" required>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="postalCode">Postal Code:</label>
    <input type="text" name="postalCode" id="postalCode" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" required>

    <label for="street">Street:</label>
    <input type="text" name="street" id="street" required>

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" required>

    <label for="admin">Admin (1 for Yes, 0 for No):</label>
    <input type="text" name="admin" id="admin" required>

    <input type="submit" value="Register">
</form>
</body>
</html>