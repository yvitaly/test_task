<?php
session_start();
var_dump($_SESSION);

if (empty($_SESSION['is_logged_in']) || empty($_SESSION['is_admin'])) {
    echo 'Permisssion denied';
    exit();
}


    echo 'There is your post EDIT';

