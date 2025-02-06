<?php
// namespace App\Controllers;

// use App\Models\Song;
// use App\Models\Artist;

require_once 'Models/Song.php';
require_once 'Models/Artist.php';
require_once 'Controllers/Controller.php';


class SongController extends Controller {
    // Display all public songs
    public function index() {
        $songModel = new Song();
        $songs = $songModel->getPublicSongs();

        $this->view('song/index', ['songs' => $songs]);
    }

    // Display details of a single song
    public function detail($songId) {
        $songModel = new Song();
        $song = $songModel->findById($songId);

        if ($song) {
            $this->view('song/detail', ['song' => $song]);
        } else {
            $this->redirect('/songs');
        }
    }

    // Upload a new song (for artists)
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $fileUrl = $_POST['file_url']; // Replace with file upload logic
            $duration = $_POST['duration'];
            $artistId = $_SESSION['user_id']; // Assume the artist is logged in

            $songModel = new Song();
            $songId = $songModel->upload($title, $fileUrl, $duration, $artistId);

            if ($songId) {
                $this->redirect('/songs');
            } else {
                echo "Song upload failed!";
            }
        } else {
            $this->view('song/upload');
        }
    }
}