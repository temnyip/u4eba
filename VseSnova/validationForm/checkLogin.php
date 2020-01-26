<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/bd/connect.php");
$login = $_POST['username'];
$password = md5($_POST['password']);
//


$check_user = mysqli_query($connect, "SELECT *FROM `signup` WHERE `username` = '$login' AND `password` = '$password'");

if(mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user); //массив из полученных данных mysqli_fetch_assoc преобразует в читабельный массив
    $_SESSION['user'] = [
        "id" => $user['id'],
        "username" => $user['username']
    ];
$user_id = $_SESSION["user"]["id"];

    header('Location: ../notebook.php');

} else {
    $_SESSION['message'] = 'Заполняйте поля внимательнее!';

    header('Location: ../login.php');
}
