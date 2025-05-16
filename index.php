<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .book-card {
            transition: transform 0.3s;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .status-available { color: #28a745; }
        .status-checkedout { color: #dc3545; }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="display-4 text-primary">
                <i class="bi bi-book"></i> Library Catalog
            </h1>
            <a href="create.php" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Add New Book
            </a>
        </div>

        <div class="row">
            <?php
            $result = $conn->query("SELECT * FROM books");
            while($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-4 mb-4">
                <div class="card book-card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($row['author']) ?></h6>
                        <p class="card-text">
                            <strong>ISBN:</strong> <?= $row['isbn'] ?><br>
                            <strong>Status:</strong> 
                            <span class="status-<?= strtolower(str_replace(' ', '', $row['status'])) ?>">
                                <?= $row['status'] ?>
                            </span>
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           class="btn btn-sm btn-outline-danger float-end"
                           onclick="return confirm('Delete this book?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>
<?php $conn->close(); ?>