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
$all_appointments = $db->getAllAppointments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - BookEasy</title>
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
                        <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($user['appointment_date'] ?: 'Not set'); ?></p>
                        <p><strong>Join Date:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mb-3" onclick="toggleAppointments()">Show All Appointments</button>
        <div id="appointmentsTable" style="display: none;">
            <h3>Scheduled Appointments</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>Appointment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_appointments as $appt): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($appt['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($appt['username']); ?></td>
                            <td><?php echo htmlspecialchars($appt['appointment_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleAppointments() {
            const table = document.getElementById('appointmentsTable');
            table.style.display = table.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
?>