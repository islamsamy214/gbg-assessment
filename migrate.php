<?php
require_once 'config.php'; // Database configuration

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

    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }
}

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$migrationFiles = glob('Migration/*.php');

foreach ($migrationFiles as $file) {
    require_once $file;
    $className = basename($file, '.php');
    $migration = new $className();

    // Check if migration table exists
    $result = $db->query("SHOW TABLES LIKE 'migrations'");
    $tableExists = $result->num_rows > 0;

    // Check if migration has already been applied
    if ($tableExists) {
        $result = $db->query("SELECT * FROM migrations WHERE migration = '$className'");
        $migrationApplied = $result->num_rows > 0;
    } else {
        $migrationApplied = false;
    }

    // Apply or rollback migration
    if ($migrationApplied) {
        // Rollback migration
        echo "Rolling back $className...\n";
        $migration->down($db);
        $db->query("DELETE FROM migrations WHERE migration = '$className'");
        echo "Rolled back $className.\n";
    } else {
        // Apply migration
        echo "Applying $className...\n";
        $migration->up($db);
        $db->query("INSERT INTO migrations (migration) VALUES ('$className')");
        echo "Applied $className.\n";
    }
}
