<?php
namespace App\Controllers;

use App\Models\Song;
use App\Models\Playlist;

class HomeController extends Controller {
    // Display the homepage
    public function index() {
        $songModel = new Song();
        $playlistModel = new Playlist();

        $data = [
            'title' => 'Welcome to Music Platform',
            'songs' => $songModel->getPublicSongs(),
            'playlists' => $playlistModel->getPublicPlaylists()
        ];

        $this->view('home/index', $data);
    }

    // Display the about page
    public function about() {
        $this->view('home/about', ['title' => 'About Us']);
    }

    // Display the contact page
    public function contact() {
        $this->view('home/contact', ['title' => 'Contact Us']);
    }
}