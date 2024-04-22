<?php
// Import the database connection file
require 'db_connection.php';

// Function to update appointment status
function updateAppointmentStatus($appointmentId, $newStatus) {
    global $conn;
    $stmt = $conn->prepare("UPDATE appointments SET status = ? WHERE id = ?");
    $stmt->execute([$newStatus, $appointmentId]);
    return $stmt->rowCount() > 0;
}

// Check if an update request has been made
if (isset($_POST['update'])) {
    $statusUpdated = updateAppointmentStatus($_POST['appointment_id'], $_POST['new_status']);
    if ($statusUpdated) {
        echo "<script>alert('Appointment status updated!');</script>";
    } else {
        echo "<script>alert('Failed to update status.');</script>";
    }
}

// Fetch all appointments
$stmt = $conn->prepare("SELECT * FROM appointments");
$stmt->execute();
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h2>Admin Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Owner</th>
                <th>Pet Name</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?php echo htmlspecialchars($appointment['id']); ?></td>
                <td><?php echo htmlspecialchars($appointment['owner_name']); ?></td>
                <td><?php echo htmlspecialchars($appointment['pet_name']); ?></td>
                <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                <td><?php echo htmlspecialchars($appointment['status']); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                        <input type="submit" name="update" value="Confirm" onclick="this.form.new_status.value='confirmed';">
                        <input type="submit" name="update" value="Cancel" onclick="this.form.new_status.value='cancelled';">
                        <input type="hidden" name="new_status">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
