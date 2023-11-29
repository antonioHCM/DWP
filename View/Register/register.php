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
    <title>Registration Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px; /* Added margin for separation */
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
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

        <label for="admin">Admin (1 for Yes, 0 for No):</label>
        <input type="text" name="admin" id="admin" required>

        <input type="submit" value="Register">
    </form>
</body>
</html>