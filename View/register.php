<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    require_once 'DataAccess/DBconnector.php'; 
    $db = new DBConnector();

    require_once 'Controller/NewUserController.php'; 
    $userController = new NewUserController($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postalCode = $_POST['postalCode'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];

        $registrationResult = $userController->registerUser($postalCode, $firstName, $lastName, $password, $email, $admin);

        if ($registrationResult) {
            echo "Registration successful!";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h1>Registration Page</h1>
    
    <form action="register" method="post">
        Postal Code: <input type="text" name="postalCode"><br>
        First Name: <input type="text" name="firstName"><br>
        Last Name: <input type="text" name="lastName"><br>
        Password: <input type="password" name="password"><br>
        Email: <input type="email" name="email"><br>
        Admin (1 for Yes, 0 for No): <input type="text" name="admin"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>