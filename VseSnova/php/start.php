<?php
require_once ('bd/bd.php');
$user_id=$_COOKIE['session'];
$db = new dataBase("localhost", "root", "", "lesson");
$records = $db->fetch($user_id);
echo json_encode($records, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
?>