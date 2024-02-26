<?php
require_once '../../public/models/avisModel.php';
require_once '../../public/models/recetteModel.php';
require_once '../../public/bdd/bddConnexion.php';

// Vérifie si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['idUser'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /login-register");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si toutes les données nécessaires sont présentes
    if (isset($_POST['idRecette'], $_POST['description'], $_POST['notes'])) {
        $idRecette = $_POST['idRecette'];
        $description = $_POST['description'];
        $notes = $_POST['notes'];

        // Utiliser l'ID de l'utilisateur stocké dans la session
        $idUser = $_SESSION['idUser'];

        // Insertion de l'avis dans la base de données
        $avisModel = new AvisModel($db);
        $avisModel->insertAvis(date('Y-m-d'), $description, $notes, $idRecette, $idUser);

        // Redirection vers la page des détails de la recette
        header("Location: detailsRecetteViews.php?id={$idRecette}");
        exit();
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>