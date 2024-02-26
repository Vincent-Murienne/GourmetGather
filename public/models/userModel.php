<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function generateResetToken($email) {
        $token = bin2hex(random_bytes(16));
        $token_hash = hash('sha256', $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    
        $sql = "UPDATE user
                SET reset_token_hash = ?, reset_token_expires_at = ?
                WHERE email = ?";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$token_hash, $expiry, $email]);
    
        $affected_rows = $stmt->rowCount(); // Obtenir le nombre de lignes affectées
    
        if ($affected_rows > 0) {
            require '../../public/models/mailer.php';
            $mail->setFrom("noreply@example.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END
            Click <a href='http://localhost:8000/reset-password.php?token=$token'>here</a> to reset your password.
            END;
    
            try {
                $mail->send();
                echo "Message sent, please check your email.";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "No user found with the provided email.";
        }
    }
    

    public function insertUser($nom, $prenom, $email, $motDePasse, $roles) {
        $query = "INSERT INTO user (nom, prenom, email, motDePasse, roles) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $motDePasse, $roles]);
    }

    public function verifierConnexion($email, $motDePasse) {
        $query = "SELECT motDePasse FROM user WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($motDePasse, $result['motDePasse'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function verifierConnexionAdm() {
        $query = "SELECT * FROM user WHERE roles = 1";
        $stmt = $this->db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
