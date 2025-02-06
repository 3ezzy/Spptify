<?php
// namespace App\Controllers;

// use App\Models\Song;
// use App\Models\Playlist;

require_once 'Models/Song.php';
require_once 'Models/Playlist.php';

require_once 'Controllers/Controller.php';

class HomeController extends Controller {
    // Display the homepage
    public function index() {
        // Check if the user is logged in
        session_start();
        if (isset($_SESSION['user_id'])) {
            $data = [
                'title' => 'Welcome to MyMusic',
                'username' => $_SESSION['username']
            ];
            $this->view('home/index', $data);
        } else {
            // Redirect to login if not logged in
            $this->redirect('/login');
        }
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