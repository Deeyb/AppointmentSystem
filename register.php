<?php
include 'includes/classloader.inc.php';


if (isset($_POST["submit"])) {
    // Instantiate UserController
    $controller = new Control();
    // Call the registerUser method
    $controller->registerUser($_POST);
}
$view = new View();
$view->displayHeader();
$view->displayNavbar();
$view->registrationForm();
$view->displayFooter();
?>