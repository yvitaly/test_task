<?php
session_start();
if(!empty($_POST["password"])) {
    $password = $_POST["password"];
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
 else {
    $passwordErr = "Please enter password   ";
}

if (!empty( $passwordErr)) {
    echo $passwordErr;
    exit();
}
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
    echo "E-mail адрес $email указан верно.\n";
}

saveUser($_POST['firstName'], $_POST['email'], $_POST['password']);

function saveUser($firstName, $email, $password) {
    $mysql = new mysqli('localhost', 'root', '', 'ekreative-db');
    $mysql->query("INSERT INTO `users` (`firstName`, `email`, `password`) VALUES ('$firstName', '$email', '$password')");

    $mysql->close();}

$_SESSION['is_logged_in'] = true;
header('Location: posts.php');

?>
