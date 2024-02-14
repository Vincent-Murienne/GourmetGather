<?php

require_once '../models/recetteModel.php';

class RecetteController {
    private $recetteModel;

    public function __construct($recetteModel) {
        $this->recetteModel = $recetteModel;
    }

    public function list() {
        $recettes = $this->recetteModel->getAllRecettes();
        include '../views/recetteList.php';
    }
}

$recetteModel = new RecetteModel($db);
$recetteController = new RecetteController($recetteModel);

$recetteController->list();


?>

