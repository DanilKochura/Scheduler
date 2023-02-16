<?php
require '../../../config/config.php';
require '../../../models/mail.php';
require '../../../../vendor/autoload.php';
session_start();

$db = new \models\DB();


file_put_contents(__DIR__.'/0.txt', print_r($_POST, 1));

$uid = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];
$type = $_POST['type'];


$db->conn->query("INSERT into feedback_sched(user_id, email, text, type) values('$uid', '$email', '$text', '$type')");


$id = $db->conn->insert_id;

sendEmail('kochura2017@yandex.ru', $name, $text, 'Новое обращение в тп №'.$id);
sendEmail('vacbanny2016@yandex.ru', $name, $text, 'Новое обращение в тп №'.$id);
sendEmail('v.ivanov@mzpo.education', $name, $text, 'Новое обращение в тп №'.$id);




echo 'a';