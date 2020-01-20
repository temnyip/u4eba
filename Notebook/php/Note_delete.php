<?php

require_once('bd/bd.php');
$note_id = $_REQUEST["note_id"];
$db = new dataBase("localhost", "root", "", "lesson");
$record = $db->Delete_note($note_id);
echo $record;
