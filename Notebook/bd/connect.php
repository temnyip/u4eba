<?php
$connect = mysqli_connect('localhost', 'root', '', 'lesson');

if (!$connect) {
    die('Error connect to DataBase');
}