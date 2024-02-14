<?php
require_once '../models/userModel.php'; 

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login($email, $motDePasse) {
        $result = $this->userModel->verifierConnexion($email, $motDePasse);
        if ($result) {
            // L'utilisateur est connecté avec succès
            // Vous pouvez rediriger l'utilisateur vers une page sécurisée
            // ou effectuer d'autres actions nécessaires
            echo "Vous êtes connecté avec succès.";
        } else {
            // Identifiants incorrects
            // Affichez un message d'erreur à l'utilisateur
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}
?>
