<?php

session_start();
if(!$_SESSION['user']) {
    header('Location: ../login.php'); //если пользователь не существует, то перенаправляем на страницу с логином
}

if(isset($_POST['save'])) {
    $namePost = $_POST['name'];
    $date = $_POST['date'];
    $note = $_POST['note'];
    $user_id = $_SESSION['user']['id'];
    $mysqli = new mysqli("localhost","root","", "lesson");
    $result = $mysqli ->query("INSERT INTO notebook (namePost, date_create, text, user_id) VALUES('$namePost','$date', '$note', '$user_id')");

    if($result){
        echo 'Сохранено';
    } else {
        echo 'Ошибка сохранения';
    }
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <!--    <script src="ajax/ajaxNote.js"></script>-->
<!--    <script src = "test.js"></script>-->
    <script src="js/script.js"></script>

</head>
<body class="d-flex flex-column h-100">

<div class="section">
    <div class="container">
        <div class="header navbar fixed-top">SUPER NOTEBOOK
            <a href="php/logout.php" class="logout"><?php echo $_SESSION['user']['id']?>, выход</a>
        </div>

        <form class="left" id="form2">

            <div class="input-group">
                <input type="text" class="search form-control" placeholder="Search for ...">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">Поиск!</button>
        </span>
            </div>

            <div class="scr" id="notes">
                <tbody>

                </tbody>
            </div>
            <div  class="container_fluid">
                <button class="message" value="add" onclick="AddNote(event)">Добавить запись</button>
            </div>
        </form>
    </div>
    <div class="container addContainer">
        <form method="POST" class="right content2" id="form1" action="">
                    <div class="Edit_node">Внесение заметок</div>
                    <input type="text" class="Note_name" placeholder="Имя записи ..." id="name" name="name">
            <div class="form-control-feedback"></div>
                    <input type="date" class=" form-control Note" placeholder="Data" id="date" name="date">
            <div class="form-control-feedback"></div>
                    <textarea type="text" class="Note_text" placeholder="Сделайте запись ..." id="note" name="note"></textarea>
            <div class="form-control-feedback"></div>
                    <button class="form-action-buttons register1" name = "save" type="submit">Сохранить</button>
                        </form>

    </div>




    <div class="footer fixed-bottom mt-auto py-3">Copyright by ..., 2019</div>
</div>
</html>
