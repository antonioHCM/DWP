<?php

require_once __DIR__.'/router.php';

get('/','View/Home/index.php');

post('/','View/Home/index.php');

get('/contact','View/Contact/contact.php');

get('/register','View/Register/register.php');

post('/register','View/Register/register.php');

post('/login','View/Login/login.php');

get('/login','View/Login/login.php');

get('/product','View/Product/product.php');

any('/404', 'View/404.php');


?>