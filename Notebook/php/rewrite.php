<?php

require_once('bd/bd.php');
$note_id = $_REQUEST["note_id"];
$note = $_REQUEST["note"];
$date = $_REQUEST["date"];
$name = $_REQUEST["note_name"];
$db = new dataBase("localhost", "root", "", "lesson");
$record = $db->Update($note_id, $note, $date, $name);
echo json_encode($record);
