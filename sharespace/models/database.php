<?php
class Database {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function userExists($email, $username) {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        return $stmt->fetch() !== false;
    }

    public function createUser($first_name, $email, $username, $hashed_password, $comment) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (first_name, email, username, password, comment) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$first_name, $email, $username, $hashed_password, $comment]);
            return "Registration successful!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllComments() {
        $stmt = $this->pdo->prepare("SELECT username, comment, created_at FROM users WHERE comment IS NOT NULL");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>