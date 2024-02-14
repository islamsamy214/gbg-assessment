<?php

require_once 'UserModel.php';

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new UserModel($db);
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $birthdate = $_POST["birthdate"];
            $phone = $_POST["phone"];
            $url = $_POST["url"];

            if ($this->userModel->addUser($username, $email, $password, $birthdate, $phone, $url)) {
                // User added successfully
                echo "User added successfully!";
            } else {
                // Error adding user
                echo "Error adding user!";
            }
        }
    }

    public function list()
    {
        $users = $this->userModel->getUsers();
        include 'usersList.php';
    }

    public function delete($userId)
    {
        if ($this->userModel->deleteUser($userId)) {
            // User deleted successfully
            echo "User deleted successfully!";
        } else {
            // Error deleting user
            echo "Error deleting user!";
        }
    }

    public function getUserDetails($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if ($user) {
            // Assuming you're returning JSON for Ajax response
            header('Content-Type: application/json');
            echo json_encode($user);
        } else {
            // Handle if user not found
            http_response_code(404);
            echo json_encode(array("message" => "User not found."));
        }
    }
}
