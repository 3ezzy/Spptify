<?php
namespace App\Controllers;

use App\Models\User;

class UserController extends Controller {
    // Display the login page
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password_hash'])) {
                // Start a session and redirect to the dashboard
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $this->redirect('/');
            } else {
                echo "Invalid email or password!";
            }
        } else {
            $this->view('user/login');
        }
    }

    // Display the registration page
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $userId = $userModel->create($username, $email, $password);

            if ($userId) {
                $this->redirect('/login');
            } else {
                echo "Registration failed!";
            }
        } else {
            $this->view('user/register');
        }
    }

    // Log out the user
    public function logout() {
        session_start();
        session_destroy();
        $this->redirect('/');
    }
}