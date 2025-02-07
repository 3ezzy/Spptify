<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/Models/User.php';

try {
    // Test database connection
    $result = $db->query('SELECT NOW()')->fetch();
    echo "Database connection successful!\n";
    
    // Check if user_role type exists
    $typeExists = $db->query("
        SELECT EXISTS (
            SELECT 1 FROM pg_type 
            WHERE typname = 'user_role'
        )
    ")->fetchColumn();
    echo "user_role type exists: " . ($typeExists ? "Yes" : "No") . "\n";
    
    // Check if Users table exists
    $tableExists = $db->query("
        SELECT EXISTS (
            SELECT 1 FROM information_schema.tables 
            WHERE table_name = 'users'
        )
    ")->fetchColumn();
    echo "Users table exists: " . ($tableExists ? "Yes" : "No") . "\n";
    
    // Test user creation
    $userModel = new User($db);
    $userId = $userModel->create(
        'testuser_' . time(),
        'test_' . time() . '@example.com',
        password_hash('password123', PASSWORD_DEFAULT),
        'user'
    );
    echo "Test user created with ID: " . $userId . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
?>