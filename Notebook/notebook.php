<?php
session_start();
if(!$_SESSION['user']) {
    header('Location: ../login.php'); //если пользователь не существует, то перенаправляем на страницу с логином
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--    <script src="ajax/ajaxNote.js"></script>-->
    <script src = "test.js"></script>


</head>
<body class="d-flex flex-column h-100">

<div class="section">
    <div class="container">
        <div class="header navbar fixed-top">SUPER NOTEBOOK
            <a href="php/logout.php" class="logout"><?php echo $_SESSION['user']['username']?>, выход</a>
        </div>

        <form class="left" id="form2">

            <div class="input-group">
                <input type="text" class="search form-control" placeholder="Search for ...">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">Поиск!</button>
        </span>
            </div>

            <div class="scr" id="notes"></div>
            <div  class="container_fluid">
                <button class="message" value="add" onclick="AddNote(event)">Добавить запись</button>
            </div>
        </form>
    </div>
    <div class="container addContainer">
        <form class="right content2" id="form1">
            <!--        <div class="Edit_mode">Edit node</div>-->
            <!--        <input type="text" class="Note_name" placeholder="Имя записи ..." id="name" name="name">-->
            <!--        <input type="date" class=" form-control Note" placeholder="Data" id="date" name="date">-->
            <!--        <textarea type="text" class="Note_text" placeholder="Сделайте запись ..." id="note" name="note"></textarea>-->
            <!--           <button class="register1" type="Submit">Сохранить</button>-->
            <!--            </form>-->
    </div>

<!--    <script src="script.js"></script>-->



    <div class="footer fixed-bottom mt-auto py-3">Copyright by ..., 2019</div>
</div>
</html>
