<?php
function dd($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

use models\DB;
use models\TaskService;
use models\User;
require ROOT.'models/TaskModel.php';
require ROOT.'models/TaskService.php';
require ROOT.'models/DeskSettings.php';
require ROOT.'models/User.php';

require ROOT.'models/Task.php';
require ROOT.'models/Desk.php';


$uri = explode('/',$_SERVER['REQUEST_URI']);
$GLOBALS['sitemap'] = array (
	'_404' => 'page404.php',   // Страница 404</span>
	'' => 'index.php',   // Главная страница
	'profile/?' => 'profile/index.php',
	'profile/settings' => 'profile/settings.php',
	'profile/blog' => 'profile/blog.php',
	'profile/access' => 'profile/access.php',
	'profile/history' => 'profile/history.php',
	'profile/export' => 'profile/export.php',
	'profile/design' => 'profile/design.php',
	'profile/notifications' => 'profile/notifications.php',
	'desk/?(.*)?' => 'index.php'

	// Больше правил
);
// Код роутера
class uSitemap {
	public $title = '';
	public $params = null;
	public $classname = '';
	public $data = null;

	public $request_uri = '';
	public $url_info = array();

	public $found = false;

	function __construct() {
		$this->mapClassName();
	}

	function mapClassName() {

		$this->classname = '';
		$this->title = '';
		$this->params = null;

		$map = &$GLOBALS['sitemap'];
		$this->request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$this->url_info = parse_url($this->request_uri);
		$uri = urldecode($this->url_info['path']);
		//echo $uri.'<br>';
		$data = false;
		foreach ($map as $term => $dd) {
			$match = array();
			$term = '/scheduler/'.$term;
			
			$i = preg_match('@^'.$term.'$@Uu', $uri, $match);
			if ($i > 0) {
				// Get class name and main title part
				$m = explode(',', $dd);
//                print_r($m);
				$data = array(
					'classname' => isset($m[0])?strtolower(trim($m[0])):'',
					'title' => isset($m[1])?trim($m[1]):'',
					'params' => $match,
				);
				break;
			}
		}
		if ($data === false) {
			// 404
//            if (isset($map['_404'])) {
//                // Default 404 page
//                $dd = $map['_404'];
//                $m = explode(',', $dd);
//                $this->classname = strtolower(trim($m[0]));
//                $this->title = trim($m[1]);
//                $this->params = array();
//            }
			$this->found = false;
		} else {
			// Found!
			$this->classname = $data['classname'];
			$this->title = $data['title'];
			$this->params = $data['params'];
			$this->found = true;
		}
//        print_r($this->params);
		return $this;
	}
}
$sm = new uSitemap();
$routed_file = $sm->classname; // Получаем имя файла для подключения через require()
$did = trim($sm->params[1], '/') ?: $_SESSION['user'];
if(!$routed_file)
{
	$routed_file = $page = $uri[2].'.php';
}
$db = new DB();
if(!in_array($routed_file, ['login.php', 'signup.php', 'reset.php']))
{
    if(!($_SESSION['user']))
    {
        ob_start();

        header("Location: https://imdibil.ru/scheduler/login");

        ob_end_flush();
    }
	$user = new User($_SESSION['user']);
	$adm = $user->getAccesssedUsers();
    $set = new \models\DeskSettings();
    $set->get($did);
    if($set->picture and $routed_file == 'index.php')
    {
        echo "<style>body{background: url(https://imdibil.ru/scheduler/assets/images/uploads/".$set->picture.") no-repeat; background-size: cover;backdrop-filter: blur(0px); background-attachment: fixed; }</style>";
    }
}
$tasks = new \models\Desk($did);


include ROOT . 'views/inc/header.php';
//die('s');
if(!file_exists(ROOT.'views/'.$routed_file))
{
	die(ROOT.'views/'.$routed_file);
}

require ROOT.'views/'.$routed_file;

//include ROOT.'views/index.php';
include ROOT . '/views/inc/footer.php';

