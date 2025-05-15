<?php
session_start();
require_once '../config/config.php';
require_once '../models/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$db = new Database($pdo);
$comments = $db->getAllComments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ShareSpace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>This is the home page for ShareSpace.</p>
        <h3>User Comments</h3>
        <?php foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($comment['username']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($comment['comment']); ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $comment['created_at']; ?></small></p>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>