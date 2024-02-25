<?php

class AvisModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllAvis() {
        $query = "SELECT * FROM avis";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvisById($id) {
        $query = "SELECT * FROM avis WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }

    // Insertion avis
    // dateAvis = date du jour
    // idUtilisateur ça prend l'id de l'utilisateur connecté
    // idRecette ça prend l'id de la recette sélectionnée
    public function insertAvis($dateAvis, $description, $notes, $idRecette, $idUtilisateur) {
        $query = "INSERT INTO avis (idRecette, idUtilisateur, note, commentaire) VALUES (:idRecette, :idUtilisateur, :note, :commentaire)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idRecette', $idRecette);
        $stmt->bindValue(':idUtilisateur', $idUtilisateur);
        $stmt->bindValue(':note', $note);
        $stmt->bindValue(':commentaire', $commentaire);
        $stmt->execute();
        $stmt->closeCursor();
    }
}

?>
