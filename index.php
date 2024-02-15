<?php

require_once 'config.php'; // Configuration file
require_once 'Database.php'; // Database class
require_once './Controller/UserController.php'; // User controller class

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$userController = new UserController($db);

$route = $_SERVER['REQUEST_URI'] != '/' ? $_SERVER['REQUEST_URI'] : '/list';
switch ($route) {
    case '/create':
        $userController->create();
        break;
    case '/add':
        $userController->add();
        break;
    case '/list':
        $userController->list();
        break;
    case '/delete':
        $userController->delete();
        break;
    case '/getUserDetails':
        $userId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($userId !== null) {
            $userController->getUserDetails($userId);
        }
        break;
    default:
        break;
}
