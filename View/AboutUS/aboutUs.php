<?php


        require_once __DIR__.'/../../Model/SessionHandle.php';

        
        $session = new SessionHandle();
        
       if(!$session->logged_in()){
            $redirect = new Redirector("/login");
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="View/AboutUs/styles.css">
</head>
<body>
<header>
    <h1>Fruit Shop</h1>
    <nav>
        <a href="/">Home</a>
        <a href="login">Login</a>
        <a href="aboutus">About Us</a>
        <a href="contact">Contact</a>
        <a id="navUsername">
        
            <?php
            require_once __DIR__.'/../../Model/SessionHandle.php';
            require_once __DIR__.'/../../Controller/CategoryController.php';
            require_once __DIR__.'/../../Controller/AdminController.php';

             if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] === '1') {
                echo '<a href="/adminPanel">Admin Panel</a>';
            }
            ?>
        <a id="navUsername">
            <?php

            if ($session->logged_in()) {
                // Display user
                echo 'Welcome, ' . $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
                echo ' <a href="/logout" class="logout-link">Logout</a>';
            } 
            ?>
        </a>
        </a>
    </nav>
</header>
<section class="hero">
<h2>Welcome to Our Fruit Shop</h2>
<p><?php

    $db = new DBConnector();

    $adminController = new AdminController($db);
    $infoID = 'News';
    $news = $adminController->getInfoByID($infoID); 
    
    if (!empty($news)) {
        echo '<h2>' . htmlspecialchars($news['content']) . '</h2>';
    } else {
        echo 'No information available.';
    }

    
?></p>
</section>

    <section>
        <h2>Opening Hours</h2>
        <p><?php
        $db = new DBConnector();

        $adminController = new AdminController($db);
        $infoID = 'OpeningHours';
        $news = $adminController->getInfoByID($infoID); 
        
        if (!empty($news)) {
            echo htmlspecialchars($news['content']);
        } else {
            echo 'No information available.';
        }

 
?></p>
    </section>
    <section>
        <h2>Our Mission</h2>
        <p><?php

        $infoID = 'CompanyDescription';
        $news = $adminController->getInfoByID($infoID); 

        if (!empty($news)) {
            echo htmlspecialchars($news['content']);
        } else {
            echo 'No information available.';
        }
        

?></p>
    </section>
    <footer>
    <p>&copy; 2023 Fruit Shop</p>
</footer>  