<?php
require_once '../config/config.php';
require_once '../models/database.php';

class UserController {
    private $db;

    public function __construct($pdo) {
        $this->db = new Database($pdo);
    }

    public function register($first_name, $email, $username, $password, $appointment_date = null) {
        if (empty($first_name) || empty($email) || empty($username) || empty($password) || empty($appointment_date)) {
            return "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        if (strlen($password) < 6) {
            return "Password must be at least 6 characters.";
        }
        if ($this->db->userExists($email, $username)) {
            return "Email or username already exists.";
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->createUser($first_name, $email, $username, $hashed_password, $appointment_date);
    }

    public function login($username, $password) {
        if (empty($username) || empty($password)) {
            return "All fields are required.";
        }
        $user = $this->db->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return "Login successful!";
        }
        return "Invalid username or password.";
    }
}
?>