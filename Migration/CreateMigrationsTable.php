<?php
class CreateMigrationsTable {
    public function up($db) {
        $sql = "CREATE TABLE migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $db->query($sql);
    }

    public function down($db) {
        $sql = "DROP TABLE migrations";
        $db->query($sql);
    }
}
