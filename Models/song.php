<?php
namespace App\Models;

require_once __DIR__ . '/../../app/config/database.php'; // Include the database connection

class Song {
    protected $db;

    public function __construct() {
        global $db; // Use the global $db connection
        $this->db = $db;
    }

    // Fetch all public songs
    public function getPublicSongs() {
        $sql = "SELECT * FROM songs WHERE is_public = TRUE";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Fetch a song by ID
    public function findById($songId) {
        $sql = "SELECT * FROM songs WHERE song_id = :song_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['song_id' => $songId]);
        return $stmt->fetch();
    }
}