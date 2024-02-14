<?php
require_once '../models/userModel.php';
require_once '../bdd/bddConnexion.php';

class logoutController {

    public function handleLogout() {
        session_start();
        session_destroy();
        header('Location: ../views/home.php');
        exit();
    }
}

$controller->handleLogout();
?>