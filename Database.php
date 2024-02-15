<?php
class Database {
    private $connection;

    public function __construct($host, $user, $pass, $dbname) {
        $this->connection = new mysqli($host, $user, $pass, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

    public function execute($stmt) {
        return $stmt->execute();
    }

    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }
}
