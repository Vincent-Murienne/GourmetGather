<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <ul>
        <?php 
            if ($recetteModel instanceof RecetteModel) {
                $recettes = $recetteModel->getAllRecettes();
                if (!empty($recettes)): 
                    foreach ($recettes as $recette): ?>
                        <li><?php echo $recette['titre']; ?></li>
                    <?php endforeach;
                else: ?>
                    <li>Aucune recette trouvée</li>
                <?php endif;
            } else {
                echo "Erreur: Le modèle de recette n'est pas disponible.";
            }
        ?>
    </ul>
</body>
</html>
