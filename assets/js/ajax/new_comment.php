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

return Comment::add($_POST['text'], $_SESSION['user'], $_POST['id_task']);
