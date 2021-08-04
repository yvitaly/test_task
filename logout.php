<?php
session_start();
unset($_SESSION['is_logged_in']);
unset($_SESSION['is_admin']);

header('Location: index.php');
?>

