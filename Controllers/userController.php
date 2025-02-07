<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/Controller.php';

class UserController extends Controller
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Display the login page
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User($this->db);
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Validate form inputs
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            $accountType = $_POST['account-type'] ?? 'user';

            // Enhanced validation
            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                throw new Exception("All fields are required!");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format!");
            }

            if (strlen($password) < 8) {
                throw new Exception("Password must be at least 8 characters long!");
            }

            if ($password !== $confirmPassword) {
                throw new Exception("Passwords do not match!");
            }

            // Create a new user
            $userModel = new User($this->db);
            $userId = $userModel->create(
                $username,
                $email,
                password_hash($password, PASSWORD_DEFAULT),
                $accountType
            );

            if ($userId) {
                // Corrected path for redirect
                header('Location: /Views/login.php?registered=true');
                exit();
            }
        } catch (Exception $e) {
            error_log("Registration Error: " . $e->getMessage());
            echo $e->getMessage();
        }
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
            $userModel = new User($this->db);
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
