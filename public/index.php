<?php
require '../vendor/autoload.php';
require 'views/Navbar/navbarViews.php';

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/home') {
    require 'views/Home/homeViews.php';
} elseif ($uri === '/login-register') {
    require 'views/Login-Register/login-registerViews.php';
}
elseif ($uri === '/controllers/registerController.php') {
    require '../../controllers/registerController.php';
} elseif ($uri === '/controllers/loginController.php') {
    require 'controllers/loginController.php';
}
elseif ($uri === '/1'){
    require 'phpinfo.php';
}
else{
    require 'errors/404.php';
}
?>