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
        try {
            // Begin transaction
            $this->db->beginTransaction();

            // Convert 'personal' to 'user' for compatibility
            if ($accountType === 'personal') {
                $accountType = 'user';
            }

            // Validate account type
            $validRoles = ['user', 'artist', 'admin'];
            if (!in_array($accountType, $validRoles)) {
                throw new Exception("Invalid account type");
            }

            // Check if user exists
            $checkSql = "SELECT COUNT(*) FROM Users WHERE username = :username OR email = :email";
            $checkStmt = $this->db->prepare($checkSql);
            $checkStmt->execute([
                ':username' => $username,
                ':email' => $email
            ]);

            if ($checkStmt->fetchColumn() > 0) {
                throw new Exception("Username or email already exists");
            }

            // Insert new user
            $sql = "INSERT INTO Users (username, email, password_hash, role) 
                    VALUES (:username, :email, :password_hash, :role::user_role)
                    RETURNING user_id";
            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password_hash' => $passwordHash,
                ':role' => $accountType
            ]);

            $userId = $stmt->fetchColumn();

            // If registering as an artist, create artist record
            if ($accountType === 'artist') {
                $artistSql = "INSERT INTO Artists (user_id, bio, profile_picture_url) 
                             VALUES (:user_id, '', '')";
                $artistStmt = $this->db->prepare($artistSql);
                $artistStmt->execute([':user_id' => $userId]);
            }

            $this->db->commit();
            return $userId;
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Database Error: " . $e->getMessage());
            error_log("Error Code: " . $e->getCode());
            error_log("Stack trace: " . $e->getTraceAsString());

            // Provide specific error messages
            if ($e->getCode() == '42P01') {
                throw new Exception("Table does not exist");
            } elseif ($e->getCode() == '23505') {
                throw new Exception("Username or email already exists");
            } elseif ($e->getCode() == '22P02') {
                throw new Exception("Invalid account type");
            }

            throw new Exception("Database error occurred");
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("User Creation Error: " . $e->getMessage());
            throw $e;
        }
    }

    public function findByEmail($email)
    {
        try {
            $sql = "SELECT * FROM Users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error in findByEmail: " . $e->getMessage());
            throw new Exception("Error finding user");
        }
    }
}
