<?php
// namespace App\Controllers;

// use App\Models\Song;

require_once 'Models/Song.php';
require_once 'Controllers/Controller.php';

class SongController extends Controller {
    public function index() {
        $songModel = new Song();
        $songs = $songModel->getPublicSongs();

        $this->view('song_index', ['songs' => $songs]);
    }

    public function detail($songId) {
        $songModel = new Song();
        $song = $songModel->findById($songId);

        if ($song) {
            $this->view('song_detail', ['song' => $song]);
        } else {
            $this->redirect('/songs');
        }
    }
}