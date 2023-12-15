<?php

require_once __DIR__.'/router.php';

get('/','View/Home/Index.php');
post('/','View/Home/Index.php');

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

get('/aboutus','View/AboutUS/aboutUs.php');

get('/logout','View/Login/logout.php');

get('/product','View/Product/product.php');

any('/404', 'View/404.php');


?>