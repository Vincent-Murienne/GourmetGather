<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertUser($nom, $prenom, $email, $motDePasse, $roles) {
        $query = "INSERT INTO user (nom, prenom, email, motDePasse, roles) VALUES (:nom, :prenom, :email, :motDePasse, :roles)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':motDePasse', $motDePasse);
        $stmt->bindValue(':roles', $roles);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function verifierConnexion($email, $motDePasse) {
        $query = "SELECT * FROM user WHERE email = :email AND motDePasse = :motDePasse";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':motDePasse', $motDePasse);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }
}
?>