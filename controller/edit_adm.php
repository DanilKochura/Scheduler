<?php

use models\DB;
require '../config/config.php';
session_start();

$db = new DB();

$id = $_POST['admission_id'];
$add = $_POST['adding'] ?: 0;
$edit = $_POST['edit'] ?: 0;
$comment = $_POST['comment'] ?: 0;
$deadlines = $_POST['deadlines'] ?: 0;


$db->conn->query("UPDATE user_admissions set adding = '$add', comment = '$comment', edit = '$edit', deadlines = '$deadlines' where id = '$id'");
header('Location: https://imdibil.ru/scheduler/profile/access');

