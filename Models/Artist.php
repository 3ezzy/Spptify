<?php
namespace App\Models;

require_once __DIR__ . '/../../app/config/database.php'; // Include the database connection

class Artist extends User {
    // Fetch all songs by an artist
    public function getSongsByArtist($artistId) {
        $sql = "SELECT * FROM songs WHERE artist_id = :artist_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['artist_id' => $artistId]);
        return $stmt->fetchAll();
    }

    // Upload a new song
    public function uploadSong($title, $fileUrl, $duration, $artistId) {
        $sql = "INSERT INTO songs (title, file_url, duration, artist_id) VALUES (:title, :file_url, :duration, :artist_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'file_url' => $fileUrl,
            'duration' => $duration,
            'artist_id' => $artistId
        ]);
        return $this->db->lastInsertId();
    }
}