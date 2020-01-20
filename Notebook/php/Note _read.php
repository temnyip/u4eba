<?php

require_once('bd/bd.php');
$note_id = $_REQUEST["note_id"];
$db = new dataBase("localhost", "root", "", "lesson");
$record = $db->Select_note($note_id);
echo json_encode($record);
//echo $note_id;
