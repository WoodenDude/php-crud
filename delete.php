<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
    
    if (empty($title) || empty($author)) {
        die("Title and author are required");
    }

    $stmt = $conn->prepare("INSERT INTO books (title, author, isbn) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $author, $isbn);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        error_log("Database error: " . $stmt->error);
        die("Error saving book");
    }
}
?>
<!-- Form remains the same -->
