<?php

require_once __DIR__.'/router.php';

get('/','View/Home/index.php');
post('/','View/Home/index.php');

get('/contact','View/Contact/contact.php');
post('/contact','View/Contact/contact.php');

get('/register','View/Register/register.php');
post('/register','View/Register/register.php');

get('/login','View/Login/login.php');
post('/login','View/Login/login.php');

get('/view-cart','View/ShoppingCart/viewCart.php');
post('/view-cart','View/ShoppingCart/viewCart.php');

get('/adminPanel','View/AdminPanel/adminPanel.php');
post('/adminPanel','View/AdminPanel/adminPanel.php');

post('/add-to-cart','View/ShoppingCart/addToCart.php');


get('/product','View/Product/product.php');

any('/404', 'View/404.php');


?>