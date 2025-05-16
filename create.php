<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-book-plus"></i> Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Title*</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Author*</label>
                                <input type="text" name="author" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">ISBN</label>
                                <input type="text" name="isbn" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="Available">Available</option>
                                    <option value="Checked Out">Checked Out</option>
                                </select>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-secondary me-md-2">
                                    <i class="bi bi-x-circle"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Save Book
                                </button>
                            </div>
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $stmt = $conn->prepare("INSERT INTO books (title, author, isbn, status) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss", $_POST['title'], $_POST['author'], $_POST['isbn'], $_POST['status']);
                            
                            if ($stmt->execute()) {
                                header("Location: index.php");
                            } else {
                                echo '<div class="alert alert-danger mt-3">Error: ' . $stmt->error . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>