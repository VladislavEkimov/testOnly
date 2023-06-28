<?php
session_start();
require_once 'connect.php';
$name = $_POST['name'];
$telephone_number = $_POST['telephone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if (findUser($email, $telephone_number, $password, $connect) > 0){
    $_SESSION['message'] = 'С этими данными уже зарегистрирован пользователь';
    header('Location: ../register.php');
} else {
    registrationUser($name, $telephone_number, $email, $password, $password_confirm, $connect);
}
function registrationUser($name, $telephone_number, $email, $password, $password_confirm, $connect){
    if ($password === $password_confirm){
        mysqli_query($connect, "INSERT INTO `users` (`name`, `telephone`, `email`, `password`) 
                                      VALUES ('$name', '$telephone_number', '$email', '$password')");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
}
function findUser($email, $telephone_number, $password, $connect){
    $user = mysqli_query($connect, "SELECT name FROM `users` WHERE (email = '$email' OR telephone = '$telephone_number')
                                                AND password = '$password'");
    return mysqli_num_rows($user);
}