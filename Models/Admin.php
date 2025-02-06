<?php
// namespace App\Models;


require_once __DIR__ . '/../../app/config/database.php'; // Include the database connection

class Admin {
    protected $db;

    public function __construct() {
        global $db; // Use the global $db connection
        $this->db = $db;
    }

    // Fetch all users
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Ban or unban a user
    public function toggleUserBan($userId, $isBanned) {
        $sql = "UPDATE users SET is_banned = :is_banned WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'is_banned' => $isBanned,
            'user_id' => $userId
        ]);
        return $stmt->rowCount() > 0;
    }

    // Fetch all songs
    public function getAllSongs() {
        $sql = "SELECT * FROM songs";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Delete a song
    public function deleteSong($songId) {
        $sql = "DELETE FROM songs WHERE song_id = :song_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['song_id' => $songId]);
        return $stmt->rowCount() > 0;
    }

    // Fetch all playlists
    public function getAllPlaylists() {
        $sql = "SELECT * FROM playlists";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Delete a playlist
    public function deletePlaylist($playlistId) {
        $sql = "DELETE FROM playlists WHERE playlist_id = :playlist_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['playlist_id' => $playlistId]);
        return $stmt->rowCount() > 0;
    }
}