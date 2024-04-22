<?php
// Database configuration
$host = 'localhost'; // Change this to your MySQL host
$dbname = 'my_db'; // Change this to your database name
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password

try {
    // Establish database connection using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally, you can set other PDO attributes here if needed

} catch (PDOException $e) {
    // If connection fails, handle the error
    echo 'Connection failed: ' . $e->getMessage();
    // You can handle the error in other ways, like logging or redirecting the user
}
?>
