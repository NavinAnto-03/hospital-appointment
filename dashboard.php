<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard">
    <h2>Welcome, <?php echo $_SESSION['name']; ?> 👋</h2>
    <p><a href="book_appointment.php">Book an Appointment</a></p>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
