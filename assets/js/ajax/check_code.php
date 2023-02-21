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
$res = $bd->conn->query("SELECT reset_code from users where email = '{$_POST['email']}'");
if($res->num_rows == 0)
{
    throw new Exception();
}
else
{

    $user = $res->fetch_assoc();
    if($user['reset_code'] == $_POST['code'])
    {
        die('success');
    }else
    {
        throw new Exception();
    }
}
