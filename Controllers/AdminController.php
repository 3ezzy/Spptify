<?php
// namespace App\Controllers;

// use App\Models\Admin;

require_once 'Models/Admin.php';

require_once 'Controllers/Controller.php';

class AdminController extends Controller {
    // Display the admin dashboard (overview)
    public function dashboard() {
        $this->view('admin/dashboard');
    }

    // Display the Users Management page
    public function users() {
        $adminModel = new Admin();
        $users = $adminModel->getAllUsers();
        $this->view('admin/users', ['users' => $users]);
    }

    // Display the Songs Management page
    public function songs() {
        $adminModel = new Admin();
        $songs = $adminModel->getAllSongs();
        $this->view('admin/songs', ['songs' => $songs]);
    }

    // Display the Playlists Management page
    public function playlists() {
        $adminModel = new Admin();
        $playlists = $adminModel->getAllPlaylists();
        $this->view('admin/playlists', ['playlists' => $playlists]);
    }

    // Ban or unban a user
    public function toggleBan($userId) {
        $isBanned = $_POST['is_banned'] ?? false;
        $adminModel = new Admin();
        $success = $adminModel->toggleUserBan($userId, $isBanned);

        if ($success) {
            $this->redirect('/admin/users');
        } else {
            echo "Failed to update user status!";
        }
    }

    // Delete a song
    public function deleteSong($songId) {
        $adminModel = new Admin();
        $success = $adminModel->deleteSong($songId);

        if ($success) {
            $this->redirect('/admin/songs');
        } else {
            echo "Failed to delete song!";
        }
    }

    // Delete a playlist
    public function deletePlaylist($playlistId) {
        $adminModel = new Admin();
        $success = $adminModel->deletePlaylist($playlistId);

        if ($success) {
            $this->redirect('/admin/playlists');
        } else {
            echo "Failed to delete playlist!";
        }
    }
}