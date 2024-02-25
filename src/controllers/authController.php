<?php
require_once "src/models/userModel.php'; 

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function loginAdm($roles) {
        $result = $this->userModel->verifierConnexionAdm($roles);
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
