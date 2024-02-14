<?php
require_once '../models/userModel.php';
require_once '../bdd/bddConnexion.php';

class loginController {
    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function handleLogin() {
        if (isset($_POST['email']) && isset($_POST['motDePasse'])) {
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $result = $this->model->verifierConnexion($email, $motDePasse);
            if ($result) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['motDePasse'] = $motDePasse;
                $_SESSION['roles'] = $result['roles'];
                header('Location: ../views/Home/homeViews.php');
                exit();
            } else {
                $error_message = "Email ou mot de passe incorrect";
                header('Location: ../views/Login-Register/login-registerViews.php');
                exit();
            }
        }
    }
}
?>