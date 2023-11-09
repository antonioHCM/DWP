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
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h1>Registration Page</h1>
    
    <form action="register" method="post">
        
        First Name: <input type="text" name="firstName"><br>
        Last Name: <input type="text" name="lastName"><br>
        Password: <input type="password" name="password"><br>
        Email: <input type="email" name="email"><br>
        Admin (1 for Yes, 0 for No): <input type="text" name="admin"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>