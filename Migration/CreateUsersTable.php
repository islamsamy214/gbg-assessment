<?php
class CreateUsersTable {
    public function up($db) {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100),
            email VARCHAR(100),
            password VARCHAR(100),
            birthdate DATE,
            phone_number VARCHAR(10),
            url VARCHAR(200)
        )";
        $db->query($sql);
    }

    public function down($db) {
        $sql = "DROP TABLE users";
        $db->query($sql);
    }
}
?>
