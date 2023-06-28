<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$check_users = mysqli_query($connect, "SELECT * FROM `users`
                                             WHERE (email = '$login' OR telephone = '$login')
                                                AND password = '$password'");
if (mysqli_num_rows($check_users) == 1){
    $user = mysqli_fetch_assoc($check_users);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'telephone' => $user['telephone'],
        'email' => $user['email'],
        'password' => $user['password']
    ];
    header('Location: ../profile.php');
}else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}