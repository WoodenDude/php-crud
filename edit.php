<?php
require 'config.php';

// Validate book ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) die("Invalid book ID");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
    
    $stmt = $conn->prepare("UPDATE books SET title=?, author=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $author, $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

// Fetch existing data
$stmt = $conn->prepare("SELECT title, author FROM books WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$book = $stmt->get_result()->fetch_assoc();
?>
<!-- Form remains the same -->
