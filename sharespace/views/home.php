<?php
session_start();
require_once '../config/config.php';
require_once '../models/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$db = new Database($pdo);
$user = $db->getUserByUsername($_SESSION['username']);
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
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Your Profile</div>
                    <div class="card-body">
                        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                        <p><strong>Your Comment:</strong> <?php echo htmlspecialchars($user['comment'] ?: 'No comment'); ?></p>
                        <p><strong>Join Date:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mb-3" onclick="toggleComments()">Show All Comments</button>
        <div id="commentsSection" style="display: none;">
            <h3>Community Comments</h3>
            <div class="row">
                <?php foreach ($comments as $comment): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($comment['username']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($comment['comment']); ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($comment['created_at']); ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleComments() {
            const section = document.getElementById('commentsSection');
            section.style.display = section.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
?>