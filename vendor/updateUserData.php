<?php
session_start();
require_once 'connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$telephone = $_POST['telephone_number'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($connect, "UPDATE 
                                `users` 
                              SET 
                                  name = '$name',
                                  telephone = '$telephone',
                                  email = '$email',
                                  password = '$password'
                              WHERE
                                  id = '$id';");
$_SESSION['user'] = [
    'id' => $id,
    'name' => $name,
    'telephone' => $telephone,
    'email' => $email,
    'password' => $password
];
header('Location: ../profile.php');