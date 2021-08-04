<?php
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$userPDO = 'root';
$passwordPDO = '';
$dbh = new PDO('mysql:host=localhost;dbname=ekreative-db', $userPDO, $passwordPDO);
$result = $dbh->query(" SELECT * FROM `users` WHERE `email` = '$email' and password = '$password'");

$users = $result->fetchAll();
if(empty($users)) {
    header('Location: index.php');
    $_SESSION['errors'] = ['No user found'];
    exit();
}
$user = $users[0];
session_start();
$_SESSION['is_admin'] = (boolean)$user['is_admin'];
$_SESSION['is_logged_in'] = true;



header('Location: posts.php');



?>