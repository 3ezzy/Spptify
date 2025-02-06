<?php
// namespace App\Controllers;

// use App\Models\Playlist;
// use App\Models\Song;

require_once 'Models/Playlist.php';
require_once 'Models/Song.php';
require_once 'Controllers/Controller.php';

class PlaylistController extends Controller {
    // Display all public playlists
    public function index() {
        $playlistModel = new Playlist();
        $playlists = $playlistModel->getPublicPlaylists();

        $this->view('playlist/index', ['playlists' => $playlists]);
    }

    // Display details of a single playlist
    public function detail($playlistId) {
        $playlistModel = new Playlist();
        $playlist = $playlistModel->findById($playlistId);

        if ($playlist) {
            $songModel = new Song();
            $songs = $songModel->getSongsByPlaylist($playlistId); // Ensure this method exists in Song model

            $this->view('playlist/detail', [
                'playlist' => $playlist,
                'songs' => $songs
            ]);
        } else {
            $this->redirect('/playlists');
        }
    }

    // Create a new playlist
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $visibility = $_POST['visibility'];
            $userId = $_SESSION['user_id']; // Assume the user is logged in

            $playlistModel = new Playlist();
            $playlistId = $playlistModel->create($userId, $title, $description, $visibility);

            if ($playlistId) {
                $this->redirect('/playlists');
            } else {
                echo "Playlist creation failed!";
            }
        } else {
            $this->view('playlist/create');
        }
    }
}