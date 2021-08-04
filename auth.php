<?php
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$userPDO = 'root';
$passwordPDO = '';
$dbh = new PDO('mysql:host=localhost;dbname=ekreative-db', $userPDO, $passwordPDO);
// здесь мы каким-то образом используем соединение
$result = $dbh->query(" SELECT * FROM `users` WHERE `email` = '$email' and password = '$password'");
//var_dump($result->fetch_assoc());die;
$users = $result->fetchAll();
if(empty($users)) {
    echo(' polzovalel ne naiden');
    exit();
}
$user = $users[0];
session_start();
$_SESSION['is_admin'] = (boolean)$user['is_admin'];
$_SESSION['is_logged_in'] = true;



header('Location: posts.php');



?>