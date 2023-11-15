<?php
    require_once 'DataAccess/DBconnector.php'; 
    require_once 'Controller/LoginController.php'; 

    if (isset($_POST)) {
        $db = new DBConnector();
        $controller = new LoginController($db);
        $controller->submitLogin();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php

    
        // Display error message if login fails
        if (isset($loginResult) && !$loginResult) {
            echo '<p style="color: red;">Login failed. Please check your credentials and try again.</p>';
        }
    ?>

    <form method="post" action="login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>