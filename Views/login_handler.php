<?php
session_start();
require_once __DIR__ . '/../Models/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required!";
        header("Location: login.php");
        exit();
    }

    // Fetch the user by email
    $userModel = new User($db);
    $user = $userModel->findByEmail($email);

    // Verify the password
    if ($user && password_verify($password, $user['password_hash'])) {
        // Start a session and store user data
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role']; // Ensure the role is stored in the session

        // Redirect based on role
        if ($user['role'] === 'artist') {
            header("Location: artist_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password!";
        header("Location: login.php");
        exit();
    }
} else {
    // If not a POST request, redirect to the login page
    header("Location: login.php");
    exit();
}