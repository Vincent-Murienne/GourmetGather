<?php
require_once 'models/recetteModel.php';
require_once 'bdd/bddConnexion.php';

class HomeController {
    private $recetteModel;

    public function __construct($db) {
        $this->recetteModel = new RecetteModel($db);
    }

    public function index() {
        $recettes = $this->recetteModel->getAllRecettes();
        $avisRecettes = $this->recetteModel->getAvisRecette();
    }
}


$homeController = new HomeController($db);
$homeController->index();
?>
