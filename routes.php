<?php

require_once __DIR__.'/router.php';

get('/','View/Index.php');

any('/404', 'View/404.php');

?>