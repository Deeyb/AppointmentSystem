<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');  // Redirect to login page if not logged in
    exit();
}

echo "<h1>Welcome, " . $_SESSION['user_email'] . "</h1>";
echo "<a href='logout.php'>Logout</a>";
?>
