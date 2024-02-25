<?php

include 'src/bdd/bddConnexion.php';
include 'src/models/recetteModel.php';

$query = $_GET['query'];

$recetteModel = new RecetteModel($db);

$results = $recetteModel->searchRecette($query);

foreach ($results as $result) {
    echo '<div>' . $result['titre'] . '</div>';
}

?>
