<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addUser($username, $email, $password, $birthdate, $phone, $url) {
        if (!$this->validateUsername($username)) {
            return false;
        }
        if (!$this->validateEmail($email)) {
            return false;
        }
        if (!$this->validatePassword($password)) {
            return false;
        }
        if (!$this->validateBirthdate($birthdate)) {
            return false;
        }
        if (!$this->validatePhoneNumber($phone)) {
            return false;
        }
        if (!$this->validateURL($url)) {
            return false;
        }

        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, birthdate, phone_number, url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $password, $birthdate, $phone, $url);
        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

    public function deleteUser($userId) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

    public function getUsers() {
        $result = $this->db->query("SELECT username, email FROM users");
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }

    private function validateUsername($username) {
        return preg_match('/^[a-zA-Z]+$/', $username);
    }

    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validatePassword($password) {
        return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s])\S{8,}$/', $password);
    }

    private function validateBirthdate($birthdate) {
        return (bool)strtotime($birthdate);
    }

    private function validatePhoneNumber($phone) {
        return preg_match('/^\d{10}$/', $phone);
    }

    private function validateURL($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
