<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form class="form" action="vendor/registration.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Имя</label>
        <input type="text" class="form-control" name="name" placeholder="Введите имя" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Телефон</label>
        <input type="tel" class="form-control" name="telephone_number" placeholder="Введите номер телефона" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
               placeholder="Введите email" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" placeholder="Введите пароль" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Подтверждение пароля</label>
        <input type="password" class="form-control" name="password_confirm" placeholder="Подтвердите пароль" required>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

    <?php
        if (array_key_exists('message', $_SESSION)){
            echo "<div class=\"alert alert-danger mt-2 text-center\" role=\"alert\">{$_SESSION['message']}</div>";
            unset($_SESSION['message']);
        }
    ?>
</form>
</body>
</html>