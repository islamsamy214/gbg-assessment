<?php
// Load required files
require_once 'config.php'; // Configuration file
require_once 'Database.php'; // Database class
require_once 'UserController.php'; // User controller class

// Initialize database connection
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Instantiate user controller
$userController = new UserController($db);

// Route requests
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
switch ($action) {
    case 'add':
        $userController->add();
        break;
    case 'list':
        $userController->list();
        break;
    case 'delete':
        $userId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($userId !== null) {
            $userController->delete($userId);
        }
        break;
    case 'getUserDetails':
        $userId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($userId !== null) {
            $userController->getUserDetails($userId);
        }
        break;
    default:
        // Handle invalid action
        break;
}
