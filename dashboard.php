<?php
include 'includes/classloader.inc.php';
session_start();


if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');  // Redirect to login page if not logged in
    exit();
}

$view = new View();
$view->displayHeader();
$view->displayNavUser();
$view->userView();
$view->displayFooter();
?>
