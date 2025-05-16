<?php 
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, isbn=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $_POST['title'], $_POST['author'], $_POST['isbn'], $_POST['status'], $_POST['id']);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    }
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!-- Similar styling to create.php but with existing values populated -->