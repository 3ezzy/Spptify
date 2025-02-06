<?php
// namespace App\Models;

require_once __DIR__ . '/../config/database.php'; // Include the database connection

class User {
    protected $db;

    public function __construct() {
        global $db; // Use the global $db connection
        $this->db = $db;
    }

    // Fetch a user by email
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    // Create a new user
    public function create($username, $email, $password) {
        $sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        return $this->db->lastInsertId();
    }
}