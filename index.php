<?php
// public/index.php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ .'/app/models/UserModel.php';
require_once __DIR__ .'/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';


//$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);
$request=$_SERVER['REQUEST_URI'];
define('BASE_PATH','/mvc1/');
//var_dump($request);
$model = new UserModel($db);
$controller = new UserController($model);
switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH.'add':
            $controller->addUser();   
        break;
    case BASE_PATH.'delete?id='.$_GET['id']:
        var_dump($_GET['id']);
            $controller->deleteUser($_GET['id']); 
            break;
     case BASE_PATH.'update?id='.$_GET['id']:
            $controller->updateUser($_GET['id']); 
                break;    
     case BASE_PATH.'edit?id='.$_GET['id']:
             $controller->editUser($_GET['id']); 
                 break; 
    //  case BASE_PATH . 'search':
    //         $controller->searchUsers($_POST['search_term']);
    //                 break;
    //      case BASE_PATH . 'show_search':
    //         $controller->showSearchedUsers($_GET['search_term']);
    //                 break;   
        }

// if (method_exists($controller, $action)) {
//     $controller->$action();
// } else {
//     echo "Action not found!";
// }
?>
