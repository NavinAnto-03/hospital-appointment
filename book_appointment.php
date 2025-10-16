<?php
include "db_connect.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO appointments (user_id, doctor_id, appointment_date, appointment_time)
            VALUES ('$user_id', '$doctor_id', '$date', '$time')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'><h2>Appointment booked successfully!</h2><a href='dashboard.php'>Back to Dashboard</a></div>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
$doctors = $conn->query("SELECT * FROM doctors");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Book Appointment</h2>
    <form method="POST">
        <select name="doctor_id" required>
            <option value="">Select Doctor</option>
            <?php while ($row = $doctors->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['name'] . " - " . $row['specialization']; ?>
                </option>
            <?php } ?>
        </select><br>
        <input type="date" name="date" required><br>
        <input type="time" name="time" required><br>
        <button type="submit">Book</button>
    </form>
</div>
</body>
</html>
