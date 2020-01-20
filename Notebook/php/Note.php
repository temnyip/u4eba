<?php
require_once ('bd/bd.php');
$id_user=$_SESSION['user']['id'];
$name=$_REQUEST["name"];//передача значений из NBook
$date=$_REQUEST["date"];//передача значений из NBook
$note=$_REQUEST["note"];//передача значений из NBook
$db = new dataBase("localhost", "root", "", "lesson");
$db->query("INSERT INTO `notebook`(`name`, `date_create`, `text`, `note_id`) VALUES ('$name','$date','$note','$id_user')");
$records = $db->SelectAllRecordsFromNotebook();
echo json_encode($records);


?>