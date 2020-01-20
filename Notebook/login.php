<?php
session_start();
if($_SESSION['user']) {
    header('Location: notebook.php'); // если пользователь существует, то направляем на страницу профиля
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styleLog.css">
</head>
<body>

<div class="header fixed-top" id="head">SUPER NOTEBOOK</div>
<form action="validationForm/checkLogin.php" method="post">
     <input type="text" name="username" placeholder="Введите имя пользователя" class="form-control form-control-lg">

    <input type="password" name="password" placeholder="Введите свой пароль" class="form-control form-control-lg">

    <button type="submit" class="btn btn-lg btn-primary btn-block">Войти</button>
    <p><a type="button" class="btn btn-lg btn-primary btn-block" href="registration.php">Регистрация</a></p>
    <?php
    if($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
        ?>
</form>
<div class="header fixed-bottom" id="foot">Copyright by Vasyankin, 2019</div>

</body>
</html>
<?php
