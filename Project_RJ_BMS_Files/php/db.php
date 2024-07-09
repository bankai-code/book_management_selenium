<?php
require_once 'config.php';

class DB {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}