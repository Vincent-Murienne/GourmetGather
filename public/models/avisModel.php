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

    public function insertAvis($dateAvis, $description, $notes, $idRecette, $idUser) {
        $query = "INSERT INTO avis (idRecette, idUser, notes, description) VALUES (:idRecette, :idUser, :notes, :description)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idRecette', $idRecette);
        $stmt->bindValue(':idUser', $idUser);
        $stmt->bindValue(':notes', $notes);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
        $stmt->closeCursor();
    }

        // Vérifier si l'utilisateur a déjà rédigé un avis pour une recette donnée
        public function hasUserReviewed($idRecette, $idUser) {
            try {
                $query = "SELECT COUNT(*) AS count FROM avis WHERE idRecette = :idRecette AND idUser = :idUser";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':idRecette', $idRecette);
                $stmt->bindValue(':idUser', $idUser);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['count'] > 0; // Renvoie true si l'utilisateur a déjà rédigé un avis, sinon false
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }
}

?>
