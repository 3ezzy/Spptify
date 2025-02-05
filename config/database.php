<?php
// Database connection settings
$host = 'localhost';  // Change if needed
$port = '5432';       // Default PostgreSQL port
$dbname = 'music_platform';
$user = 'postgres';
$password = '0000';

try {
    // Create a new PDO instance
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable error exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Fetch results as associative arrays
        PDO::ATTR_EMULATE_PREPARES => false,  // Use real prepared statements
    ]); 
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>