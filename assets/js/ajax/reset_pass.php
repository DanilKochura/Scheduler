<?php

use models\DB;
use models\Task;

require '../../../config/config.php';
require '../../../models/TaskModel.php';

require '../../../models/Task.php';
require '../../../models/User.php';
require '../../../models/mail.php';

require '../../../../vendor/autoload.php';
//$_POST =
//[
//	'TaskTitle' => 'test',
//	'responsible' => 1,
//    'descr' => '<p>setsetsetset</p>',
//	'priority' => 70
//];
//$_POST['email'] = 'kochura2017@yandex.ru';
$bd = new \models\DB();
$pw = md5($_POST['password']);
$res = $bd->conn->query("SELECT * from users where email = '{$_POST['email']}'");
$id = $res->fetch_assoc()['id'];
$bd->conn->query("UPDATE users set password = '$pw' where id = '$id' ");
if($bd->conn->affected_rows == 0)
{
    throw new Exception();
}
die('success'.$id);
