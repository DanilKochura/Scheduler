<?php
use models\DB;
use models\Task;

require '../../../config/config.php';
require '../../../models/TaskModel.php';

require '../../../models/Task.php';
require '../../../models/User.php';

$task = (new Task())
	->get($_POST['id'])
	->getComments();


echo json_encode((array)$task->task);
