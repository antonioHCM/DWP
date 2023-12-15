<?php
    require_once __DIR__.'/../../DataAccess/DBconnector.php'; 
    require_once __DIR__.'/../../Controller/LoginController.php'; 

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
    <link rel="stylesheet" href="View/Login/styles.css">
    <title>Login Page</title>
</head>

<body>
    <header id="main-header">
        <a href="/"><h1>Fruit Shop</h1></a>
    </header>

    <h2>Log in</h2>

    <form method="post" action="login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>