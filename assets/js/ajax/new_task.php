<?php

use models\DB;
use models\Task;
ini_set('display_errors', true);
session_start();
require '../../../config/config.php';
require '../../../models/TaskModel.php';

require '../../../models/Task.php';
require '../../../models/User.php';
require '../../../models/mail.php';
require '../../../../vendor/autoload.php';
//$_POST =
//[
//	'TaskTitle' => 'test',
//	'responsible' => 3,
//    'descr' => '<p>setsetsetset</p>',
//	'priority' => 70
//];



$task = new Task();

$task->add($_POST['TaskTitle'],$_POST['responsible'],$_POST['descr'],$_POST['priority']);

if($_POST['responsible'] != $_SESSION['user'])
{
    $user = new \models\User($_POST['responsible']);
    $res = $user->getAccesssedUsers($_SESSION['user']);
    if(!$res[0]['add_note'])
    {
        file_put_contents(__DIR__.'/0.txt', 'accedd denied ', FILE_APPEND);
        die();
    }

    file_put_contents(__DIR__.'/0.txt', 'unsended ', FILE_APPEND);

		sendEmail($user->email, $user->name, 'Вам поставлена новая задача! '.PHP_EOL.$_POST['descr'].PHP_EOL, 'Новая задача!');
    file_put_contents(__DIR__.'/0.txt', 'sended', FILE_APPEND);




}
