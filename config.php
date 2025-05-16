<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db"; // Changed to library_db

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("<div style='padding: 20px; background: #ffecec; border: 1px solid red; margin: 20px;'>
        <h2>Database Connection Failed</h2>
        <p>Create database 'library_db' in phpMyAdmin and import this SQL:</p>
        <textarea style='width: 100%; height: 100px;'>
        CREATE TABLE books (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            author VARCHAR(100) NOT NULL,
            isbn VARCHAR(20) UNIQUE,
            status ENUM('Available', 'Checked Out') DEFAULT 'Available',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        </textarea>
        </div>");
}
?>