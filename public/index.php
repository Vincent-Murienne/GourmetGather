<?php
require '../vendor/autoload.php';
require 'views/Navbar/navbarViews.php';

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
    require 'views/Home/homeViews.php';
} elseif ($uri === '/login-register') {
    require 'views/Login-Register/login-registerViews.php';
}
elseif ($uri === '/phpinfo'){
    require 'phpinfo.php';
}
elseif (preg_match('/\/recettes\/\d+/', $uri)) {
    require 'views/DetailsRecette/detailsRecetteViews.php';
}
else{
    require 'errors/404.php';
}
?>