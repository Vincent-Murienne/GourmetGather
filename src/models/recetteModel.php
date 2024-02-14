<?php

require_once '../bdd/bddConnexion.php';

class RecetteModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRecettes() {
        $query = "SELECT * FROM recette";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

$recetteModel = new RecetteModel($db);

?>
