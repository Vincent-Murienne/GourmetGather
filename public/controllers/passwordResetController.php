<?php
require_once '../../public/models/userModel.php';
require_once '../../public/bdd/bddConnexion.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function generateResetToken($email) {
        $this->userModel->generateResetToken($email);
    }
}

// Utilisation du contrôleur pour générer le jeton de réinitialisation
$userController = new UserController($db);
$userController->generateResetToken($_POST['email']);
?>
