<?php

require_once __DIR__.'/router.php';

get('/','View/index.php');

get('/home','View/home.php');

get('/contact','View/contact.php');

get('/register','View/register.php');

post('/register','View/register.php');

get('/logIn','View/logIn.php');

get('/product','View/product.php');

any('/404', 'View/404.php');


?>