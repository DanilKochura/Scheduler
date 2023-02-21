<?php

session_start();
use models\DB;
use models\Task;

require '../../../config/config.php';
require '../../../models/TaskModel.php';

require '../../../models/Task.php';
require '../../../models/User.php';
require '../../../models/Comment.php';
require '../../../../vendor/autoload.php';

$db = new DB();
if($_POST['type'] == 'admitted'){

    $id = $_POST['admission_id'];
    $add = $_POST['adding'] ?: 0;
    $comment = $_POST['comment'] ?: 0;


    $db->conn->query("UPDATE user_admissions set add_note = '$add', comm_note = '$comment' where id = '$id'");
}
elseif($_POST['type'] == 'finished'){

    $id = $_POST['admission_id'];
    $finish = $_POST['finished'] ?: 0;
    $db->conn->query("UPDATE user_admissions set finish_note = '$finish' where id = '$id'");
}
header('Location: https://imdibil.ru/scheduler/profile/notifications');