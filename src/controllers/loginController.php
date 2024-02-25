<?php
require_once 'src/models/userModel.php';
require_once 'src/bdd/bddConnexion.php';

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
                header('Location: src/views/Home/homeViews.php');
                exit();
            } else {
                $error_message = "Email ou mot de passe incorrect";
                header('Location: src/views/Login-Register/login-registerViews.php');
                exit();
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoginController($db);
    $controller->handleLogin();
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
    $controller = new LoginController($db);
    $controller->handleLogout();
} else {
    // Redirection si le formulaire n'a pas été soumis
    header('Location: src/views/Login-Register/login-registerViews.php');
    exit();
}
?>