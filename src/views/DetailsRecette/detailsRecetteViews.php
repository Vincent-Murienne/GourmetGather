<?php
    require_once 'src/models/recetteModel.php';
    require_once 'src/bdd/bddConnexion.php';
    $recetteModel = new RecetteModel($db);
    $recettes = $recetteModel->getAllRecettes();
    $avisRecettes = $recetteModel->getAvisRecette();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Details Recette</title>
</head>
<body>
</body>
</html>