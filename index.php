<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

// 4. Вызор Router
$router = new Router();
$router->run();