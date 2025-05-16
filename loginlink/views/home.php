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
$all_users = $db->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - LoginLink</title>
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
                        <p><strong>Join Date:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mb-3" onclick="toggleUsers()">Show All Users</button>
        <div id="usersTable" style="display: none;">
            <h3>Registered Users</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_users as $u): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($u['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($u['username']); ?></td>
                            <td><?php echo htmlspecialchars($u['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleUsers() {
            const table = document.getElementById('usersTable');
            table.style.display = table.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
?>