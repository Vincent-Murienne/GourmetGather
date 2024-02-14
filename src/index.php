<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


include_once 'config/functions.php';

$routes = include_once 'config/routes.php';

run($_SERVER['REQUEST_URI'], $routes);

?>