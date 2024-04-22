<?php
include 'includes/classloader.inc.php';

$view = new View();
$view->displayHeader();
$view->displayNavbar();
$view->indexView();
$view->displayFooter();
?>