<?php

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

    public function getRecetteById($recetteId) {
        $query = "SELECT * FROM recette WHERE idRecette = :recetteId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':recetteId', $recetteId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function getEtapesByRecetteId($recetteId) {
        $query = "SELECT * FROM etape WHERE idEtape IN (SELECT idEtape FROM posseder WHERE idRecette = :recetteId)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':recetteId', $recetteId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIngredientsByRecetteId($recetteId) {
        $query = "SELECT * FROM ingredient WHERE idIngredient IN (SELECT idIngredient FROM detenir WHERE idEtape IN (SELECT idEtape FROM posseder WHERE idRecette = :recetteId))";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':recetteId', $recetteId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvisRecette() {
        $query = "SELECT Recette.idRecette, Recette.titre, AVG(Avis.notes) AS moyenne_notes
        FROM Recette
        JOIN Avis ON Recette.idRecette = Avis.idRecette
        GROUP BY Recette.idRecette, Recette.titre";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertRecette($titre, $description, $nombrePortions, $photo) {
        $query = "INSERT INTO recette (titre, description, nombrePortions, photo) VALUES (:titre, :description, :nombrePortions, :photo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':nombrePortions', $nombrePortions);
        $stmt->bindValue(':photo', $photo);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateRecette($id, $titre, $description, $nombrePortions, $photo) {
        $query = "UPDATE recette SET titre = :titre, description = :description, nombrePortions = :nombrePortions, photo = :photo WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':nombrePortions', $nombrePortions);
        $stmt->bindValue(':photo', $photo);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteRecette($id) {
        $query = "DELETE FROM recette WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function searchRecette($titre) {
        $query = "SELECT * FROM recette WHERE titre LIKE :titre";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':titre', '%' . $titre . '%');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }
}

?>
