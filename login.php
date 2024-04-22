<?php
include 'includes/classloader.inc.php';  // Make sure this path is correct

session_start();  // Start a new session or resume the existing one

if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $control = new Control();
    $loginResult = $control->loginUser($email, $password);

    if (is_array($loginResult) && $loginResult['status']) {
        $_SESSION['user_email'] = $email;
        header('Location: ' . $loginResult['dashboard']);
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
    }
}

$view = new View();
$view->displayHeader();
$view->displayNavbar();
$view->loginForm();
$view->displayFooter();
?>
