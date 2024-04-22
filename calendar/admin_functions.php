<?php

ini_set('SMTP', 'smtp.example.com');
ini_set('smtp_port', 587); // Use the appropriate SMTP port
// Include the database connection
include 'db_connection.php';

// Function to send notification to the user
function sendNotification($conn, $appointment_id, $status) {
    // Fetch the user's contact info from the database
    $query = "SELECT contact_info FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$appointment_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $contact_info = $row['contact_info'];

    // Send notification to the user
    // Example: You can use email or SMS APIs to send notifications
    // For demonstration, let's assume sending an email
    $to = $contact_info;
    $subject = 'Appointment Status Update';
    $message = "Your appointment has been $status.";
    $headers = 'From: your_email@example.com';

    // Send email
    mail($to, $subject, $message, $headers);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['appointment_id'])) {
        $action = $_POST['action'];
        $appointment_id = $_POST['appointment_id'];

        // Update the appointment status in the database
        $query = "UPDATE appointments SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        if ($action == 'confirm') {
            $stmt->execute(['confirmed', $appointment_id]);
            sendNotification($conn, $appointment_id, 'confirmed');
        } elseif ($action == 'cancel') {
            $stmt->execute(['cancelled', $appointment_id]);
            sendNotification($conn, $appointment_id, 'cancelled');
        }

        // Close the database connection
        $conn = null;
    }
}
?>
