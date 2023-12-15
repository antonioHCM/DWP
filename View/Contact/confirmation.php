<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/Contact/style.css">
    <title>Contact Form Confirmation</title>
</head>
<body>
<section class="Hours">
<h2>Welcome to Our Fruit Shop</h2>
<p><?php

    $db = new DBConnector();

    $adminController = new AdminController($db);
    $infoID = 'OpeninHours';
    $news = $adminController->getInfoByID($infoID); 
    
    if (!empty($news)) {
        echo '<h2>' . htmlspecialchars($news['content']) . '</h2>';
    } else {
        echo 'No information available.';
    }

    
?></p>
</section>
    <h2>Thank you for your submission!</h2>
    <p>We will get back to you shortly.</p>
</body>
</html>