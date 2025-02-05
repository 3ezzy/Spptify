<?php
namespace App\Controllers;

class Controller {
    // Render a view and pass data to it
    protected function view($viewPath, $data = []) {
        // Extract data array into variables
        extract($data);

        // Include the view file
        require_once __DIR__ . "/../../views/$viewPath.php";
    }

    // Redirect to a different URL
    protected function redirect($url) {
        header("Location: $url");
        exit();
    }

    // Check if a user is logged in (optional, for authentication)
    protected function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }

    // Restrict access to logged-in users (optional, for authentication)
    protected function requireLogin() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/login');
        }
    }
}