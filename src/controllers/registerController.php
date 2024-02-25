<?php
require_once 'src/models/userModel.php';
require_once 'src/bdd/bddConnexion.php';

class RegisterController {
    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function handleRegister($roles) {
        // Vérification des champs requis
        $requiredFields = ['nom', 'prenom', 'email', 'motDePasse'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                // Redirection avec un message d'erreur si un champ requis est vide
                header('Location: src/views/Login-Register/login-registerViews.php?error=missing_fields');
                exit();
            }
        }
        $hashedPassword = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
        // Tous les champs sont remplis, on peut procéder à l'insertion dans la base de données
        $this->model->insertUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $hashedPassword, $roles);
        
        // Redirection après l'insertion réussie
        header('Location: src/views/Home/homeViews.php');
        exit();
    }
}

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new RegisterController($db);
    $controller->handleRegister(0);
} else {
    // Redirection si le formulaire n'a pas été soumis
    header('Location: src/views/registerViews.php');
    exit();
}
?>
