<?php
require 'config.php';

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
</head>
<body>
    <?php
    $stmt = $conn->prepare("SELECT id, title, author, isbn, status FROM books");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()):
    ?>
    <div>
        <h2><?= htmlspecialchars($row['title']) ?></h2>
        <p>Author: <?= htmlspecialchars($row['author']) ?></p>
    </div>
    <?php endwhile; ?>
</body>
</html>
