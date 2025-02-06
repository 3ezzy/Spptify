<?php

// namespace App\Controllers;

// use App\Models\User;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/Controller.php';

class UserController extends Controller
{
    // Display the login page
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password_hash'])) {
                // Start a session and redirect to the dashboard
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                header('Location: /index.php');
            } else {
                echo "Invalid email or password!";
            }
        } else {
            $this->view('user/login');
        }
    }

    // Display the registration form
    public function register()
    {
        $this->view('register');
    }

    // Handle the registration form submission
    public function handleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Validate form inputs
            $fullName = $_POST['full_name'] ?? '';
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            $accountType = $_POST['account-type'] ?? 'personal';

            // Basic validation
            if (!empty($fullName)) {
                echo "All fields are required!";
                return;
            }

            if ($password !== $confirmPassword) {
                echo "Passwords do not match!";
                return;
            }

            // Hash the password
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Create a new user
            $userModel = new User();
            $userId = $userModel->create($fullName, $username, [
                'email' => $email,
                'password_hash' => $passwordHash,
                'account_type' => $accountType
            ]);

            if ($userId) {
                // Redirect to the login page after successful registration
                header('Location: views/login.php');
            } else {
                echo "Registration failed!";
            }
        } 
        else {
            // If not a POST request, show the registration form
            $this->view('register');
        }
    }
    // Handle the login form submission
    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate inputs
            if (empty($email) || empty($password)) {
                echo "Email and password are required!";
                return;
            }

            // Fetch the user by email
            $userModel = new User();
            $user = $userModel->findByEmail($email);

            // Verify the password
            if ($user && password_verify($password, $user['password_hash'])) {
                // Start a session and store user data
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                // Redirect to the homepage
                $this->redirect('/');
            } else {
                echo "Invalid email or password!";
            }
        } else {
            // If not a POST request, show the login form
            $this->view('login');
        }
    }


    // Log out the user
    public function logout()
    {
        session_start();
        session_destroy();
        $this->redirect('/');
    }
}
