
<?php
error_reporting(E_ALL);

ini_set('display_errors',1);
require '../../../config/config.php';
require '../../../models/DeskSettings.php';
session_start();
$id = $_SESSION['user'];
if($_POST['method'] == 'fill')
{
    print_r($_POST);
    $set = new \models\DeskSettings();
    $set->get($id);

    $set->filled = $_POST['items'][0]['active'];
    $set->save();


}