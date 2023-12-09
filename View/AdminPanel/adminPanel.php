<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="View/Home/styles.css">
</head>
<body>
<header>
    <h1>Fruit Shop</h1>
    <nav>
        <a href="/">Home</a>
        <a href="login">Login</a>
        <a href="register">Register</a>
        <a href="aboutus">About Us</a>
        <a href="contact">Contact</a>
        <a id="navUsername">
            <?php
            require_once 'Model/SessionHandle.php';
            $session = new SessionHandle();

            // Check if the user is logged in
            if ($session->logged_in()) {
                // Display user
                echo 'Welcome, ' . $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
            } else {
                $redirect = new Redirector("/login");
            }
            ?>
        </a>
    </nav>
</header>

<section class="hero">
    <h2>Welcome to Our Fruit Shop</h2>
    <p>Discover Fresh and Delicious Fruits</p>
</section>

        <?php
        require_once 'Controller/CategoryController.php';
        require_once 'Controller/AdminController.php';
        
        $db = new DBConnector();

        if (isset($_POST['UpdateCategory'])) {
           if(isset($_POST['categories'])) {
                $adminContoller = new AdminController($db);
                $adminContoller->setFeaturedCategory($_POST['categories']);
            }

        }
    
         
        $controller = new CategoryControlller($db);
        $categories = $controller->getAllCategories();
        $controller->closeConnection();
        echo '<form action="/adminPanel" method="post">';
        echo '<select name="categories">';
foreach($categories as $category) {
    echo '<option value="'.htmlspecialchars($category['categoryID']) .'" '.($category['featuredCategory'] == 1?  "selected":"" ).'>' . htmlspecialchars($category['categoryName']) .'</option>';
}   
        echo'</select>';
        echo '<button type="submit" name="UpdateCategory" class="buy-btn">Save</button>';
        echo '</form>';
        
        ?>


<footer>
    <p>&copy; 2023 Fruit Shop</p>
</footer>

</body>
</html>