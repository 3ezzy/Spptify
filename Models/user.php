<?php

require_once __DIR__ . '/../config/database.php';


class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($username, $email, $passwordHash, $accountType)
    {
        $sql = "INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $passwordHash);
        $stmt->bindParam(':role', $accountType);

        try {
            if ($stmt->execute()) {
                return $this->db->lastInsertId();
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error: " . $errorInfo[2]);
                throw new Exception("Failed to create user.");
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
            throw $e;
        }
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>