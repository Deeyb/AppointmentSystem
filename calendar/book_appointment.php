<?php
include 'db_connection.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$owner_name = $_POST['owner_name'];
$pet_name = $_POST['pet_name'];
$appointment_type = $_POST['appointment_type'];
$appointment_time = $_POST['appointment_time'];
$contact_info = $_POST['contact_info'];

$query = "INSERT INTO appointments (owner_name, pet_name, appointment_type, appointment_time, contact_info, status) VALUES (?, ?, ?, ?, ?, 'pending')";
$stmt = $conn->prepare($query);
$stmt->execute([$owner_name, $pet_name, $appointment_type, $appointment_time, $contact_info]);

echo "Success";
?>
