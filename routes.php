<?php

require_once __DIR__.'/router.php';

get('/','View/index.php');

get('/home','View/home.php');

get('/contact','View/contact.php');

get('/logIn','View/logIn.php');

any('/404', 'View/404.php');

?>