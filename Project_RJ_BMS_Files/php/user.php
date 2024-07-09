<?php
require_once 'db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class User {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function login($username, $password) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
    
        if ($user && $password == $user['password']) {
            session_start();
            $_SESSION['username'] = $user['username'];
            return true;
        }
    
        return false;
    }
}