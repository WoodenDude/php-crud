<?php
require 'config.php';

// Validate ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) die("Invalid book ID");

// Verify CSRF token in real applications
$stmt = $conn->prepare("DELETE FROM books WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>
