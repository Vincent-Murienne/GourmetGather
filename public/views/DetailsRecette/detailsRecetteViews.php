<?php
session_start();
require_once '../../../public/models/recetteModel.php';
require_once '../../../public/models/avisModel.php';
require_once '../../../public/bdd/bddConnexion.php';

// Vérifiez si l'identifiant de la recette est présent dans l'URL
echo "<link rel='stylesheet' href='detailsRecette.css'>";
echo "<title>Détails de la recette</title>";

if (isset($_GET['id'])) {
    $recetteId = $_GET['id'];

    $recetteModel = new RecetteModel($db);
    $recette = $recetteModel->getRecetteById($recetteId);

    // Initialisation de $avisModel
    $avisModel = new AvisModel($db);

    if ($recette) {
        echo "<div class='container'>";
        echo "<h1 class='recette-title'>{$recette['titre']}</h1>";

        // Afficher les étapes de la recette
        $etapes = $recetteModel->getEtapesByRecetteId($recette['idRecette']);
        echo "<div class='etapes-list'>";
        echo "<h2>Étapes :</h2>";
        foreach ($etapes as $etape) {
            echo "<li>{$etape['description']} durant {$etape['temps']} {$etape['unitéTemps']} à {$etape['temperature']} degrés</li>";
        }
        echo "</div>";

        // Afficher les ingrédients de la recette
        $ingredients = $recetteModel->getIngredientsByRecetteId($recette['idRecette']);
        echo "<div class='ingredients'>";
        echo "<h2>Ingrédients :</h2>";
        echo "<table class='ingredients-table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Quantité</th>";
        echo "<th>Unité de mesure</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($ingredients as $ingredient) {
            echo "<tr>";
            echo "<td>{$ingredient['nom']}</td>";
            echo "<td>{$ingredient['quantité']}</td>";
            echo "<td>{$ingredient['unitéMesure']}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['email']) && isset($_SESSION['motDePasse'])) {
            // Vérifier si l'utilisateur a déjà écrit un avis pour cette recette
            $hasReviewed = $avisModel->hasUserReviewed($idRecette, $_SESSION['idUser']);

            if ($hasReviewed) {
                echo "<p>Vous avez déjà écrit un avis pour cette recette.</p>";
            } else {
                // Afficher le formulaire d'ajout d'un avis
                echo "<div class='add-review'>";
                echo "<h2>Ajouter un avis :</h2>";
                echo "<form action='../../controllers/detailsRecetteController.php' method='POST'>
                    <input type='hidden' name='idRecette' value='<?php echo $idRecette; ?>'>
                    <label for='description'>Description :</label><br>
                    <textarea name='description' id='description' rows='4' cols='50' required></textarea><br>
                    <label for='notes'>Notes :</label><br>
                    <input type='number' name='notes' id='notes' min='1' max='5' required><br>
                    <button type='submit'>Ajouter l'avis</button>
                    </form>";
                echo "</div>";
            }
        } else {
            // L'utilisateur n'est pas connecté, afficher un message pour se connecter
            echo "<p>Veuillez vous connecter pour ajouter un avis.</p>";
        }

        echo "</div>";
    }
} else {
    echo "Identifiant de recette non spécifié.";
}
?>
