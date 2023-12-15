<?php

        require_once __DIR__.'/../../Model/SessionHandle.php';
        require_once __DIR__.'/../../Controller/CategoryController.php';
        require_once __DIR__.'/../../Controller/AdminController.php';
        require_once __DIR__.'/../../Controller/ProductController.php';
        require_once __DIR__.'/../../Model/SessionHandle.php';

        

        $session = new SessionHandle();
        
       if(!$session->logged_in()){
            $redirect = new Redirector("/login");
        }
        $db = new DBConnector();
        $adminController = new AdminController($db);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="View/AdminPanel/styles.css">
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
<?php
        //Update Information
        if (isset($_POST['UpdateInformation'])) {
            
            
            foreach ($_POST as $infoID => $content){
                $adminController->setInfo($infoID, $content);
            }
        
 
         }
         $information = $adminController->getInfo();
        
        if (!empty($information)) {
            echo '<form action="/adminPanel" method="post">';
            
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Content</th></tr>';

            foreach ($information as $info) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($info['infoID']) . '</td>';
                echo '<td><input type="text" name="' . htmlspecialchars($info['infoID']) . '" value="' . htmlspecialchars($info['content']) . '"></td>';
                echo '</tr>';
            }

            echo '</table>';
            

            echo '<button type="submit" name="UpdateInformation" class="buy-btn">Save</button>';
            echo '</form>';
        } else {
            echo 'No information available.';
        }

        // Close the database connection
        $adminController->closeConnection();
    ?>
        <h2>Change featured caterogy:</h2>
        <?php
        
        
        $db = new DBConnector();

        //Update Featured category

        if (isset($_POST['UpdateCategory'])) {
           if(isset($_POST['categories'])) {
                $adminContoller = new AdminController($db);
                $adminContoller->setFeaturedCategory($_POST['categories']);
            }

        }
    
         
        $controller = new CategoryControlller($db);
        $categories = $controller->getAllCategories();
        

        echo '<form action="/adminPanel" method="post">';
        echo '<select name="categories">';

        
        foreach($categories as $category) {
        echo '<option value="'.htmlspecialchars($category['categoryID']) .'" '.($category['featuredCategory'] == 1?  "selected":"" ).'>' . htmlspecialchars($category['categoryName']) .'</option>';
}   
        echo'</select>';
        echo '<button type="submit" name="UpdateCategory" class="buy-btn">Save</button>';
        echo '</form>';

?>
<?php
    
        $controller = new ProductController();

        if (isset($_POST['UpdateProduct'])) {
            foreach ($_POST as $productID => $values){
                if(isset($values['new'] )){
                    $controller->createProduct($values['categoryID'], $values['productName'], $values['brand'], $values['stockQuantity'], $values['price'], $values['description'], $values['img']);
                }
                elseif (filter_var($productID, FILTER_VALIDATE_INT)){
                    $controller->updateProduct($productID, $values['categoryID'], $values['productName'], $values['brand'],
                     $values['stockQuantity'], $values['price'], $values['description'], $values['img'] );  //too long for the snipet
                }
            }
 
         }
     
        if (isset($_GET['productID'])){
            
            $controller->deleteProduct($_GET['productID']);
        }
        $products = $controller->getProducts();
        $controller->closeConnection();
        if (!empty($products)) {

            echo '<form action="/adminPanel" method="post">';
            echo '<table border="1" id="ProductTable">';
            echo '<tbody>';
            echo '<tr><th>ProductID</th><th>CategoryID</th><th>CategoryName</th><th>ProductName</th><th>Brand</th><th>StockQuantity</th><th>Price</th><th>Description</th><th>Img</th><th>Delete</th></tr>';
        foreach($products as $product) {

            

            echo '<tr>';
            echo '<td>' . htmlspecialchars($product['productID']).'</td>';
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[categoryID]" type="text" value="' . htmlspecialchars($product['categoryID']) .'"></td>';
            echo '<td><input type="text" disabled value="' . htmlspecialchars($product['categoryName']) .'"></td>'; 
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[productName]" type="text" value="' . htmlspecialchars($product['productName']) .'"></td>'; 
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[brand]" type="text" value="' . htmlspecialchars($product['brand']) .'"></td>'; 
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[stockQuantity]" type="text" value="' . htmlspecialchars($product['stockQuantity']) .'"></td>';
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[price]" type="text" value="' . htmlspecialchars($product['price']) .'"></td>'; 
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[description]" type="text" value="' . htmlspecialchars($product['description']) .'"></td>'; 
            echo '<td><input name="'.htmlspecialchars($product['productID']).'[img]" type="text" value="' . htmlspecialchars($product['img']) . '"></td>';
            echo '<td><a href="/adminPanel?productID='.htmlspecialchars($product['productID']). '">x</a></td>';      
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '<button type="button" onclick="addRow()">Add Row</button>';
        echo '<button type="submit" name="UpdateProduct" class="buy-btn">Save</button>';
        echo '</form>';
    }
?>
<script>
    function addRow() {
        var table = document.getElementById("ProductTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        var productID = newRow.insertCell(0);
        var categoryID = newRow.insertCell(1);
        var categoryName= newRow.insertCell(2)
        var productName = newRow.insertCell(3);
        var brand = newRow.insertCell(4);
        var stockQuantity = newRow.insertCell(5);
        var price = newRow.insertCell(6);
        var description = newRow.insertCell(7);
        var img = newRow.insertCell(8);

        var id = Math.floor(Math.random()*(2500)+5000)
        
        // You can customize the content of the new cells
        productID.innerHTML = "<input type='hidden' name='" + id + "[new]'/>";
        categoryID.innerHTML = "<input name='" + id + "[categoryID]' type='text'/>";
        categoryName.innerHTML = "<input disabled type='text'/>";
        productName.innerHTML = "<input name='" + id + "[productName]' type='text'/>";
        brand.innerHTML = "<input name='" + id + "[brand]' type='text'/>";
        stockQuantity.innerHTML = "<input name='" + id + "[stockQuantity]' type='text'/>";
        price.innerHTML = "<input name='" + id + "[price]' type='text'/>";
        description.innerHTML = "<input name='" + id + "[description]' type='text'/>";
        img.innerHTML = "<input name='" + id + "[img]' type='text'/>";

    }
</script>
        
        
    
        



</body>
</html>
<?php

?>