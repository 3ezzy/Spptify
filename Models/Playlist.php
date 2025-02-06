<?php
// namespace App\Models;

require_once __DIR__ . '/../../app/config/database.php'; // Include the database connection

class Playlist {
    protected $db;

    public function __construct() {
        global $db; // Use the global $db connection
        $this->db = $db;
    }

    // Fetch a playlist by ID
    public function findById($playlistId) {
        $sql = "SELECT * FROM playlists WHERE playlist_id = :playlist_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['playlist_id' => $playlistId]);
        return $stmt->fetch();
    }

    // Fetch all public playlists
    public function getPublicPlaylists() {
        $sql = "SELECT * FROM playlists WHERE visibility = 'public'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Create a new playlist
    public function create($userId, $title, $description, $visibility) {
        $sql = "INSERT INTO playlists (user_id, title, description, visibility) VALUES (:user_id, :title, :description, :visibility)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'user_id' => $userId,
            'title' => $title,
            'description' => $description,
            'visibility' => $visibility
        ]);
        return $this->db->lastInsertId();
    }
}