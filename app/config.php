<?php

// -- DATABASE CONNECTION
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'blog');

// -- DIRECTORIES
define('ROOT', dirname(__FILE__) . '/');
define('DIR_ROOT', basename(dirname(__FILE__)));
define('DIR_CONFIG', ROOT . 'config/');
define('DIR_MODELS', ROOT . 'models/');
define('DIR_VIEWS', ROOT . 'views/');
define('DIR_CONTROLLERS', ROOT . 'controllers/');
define('DEFAULT_LAYOUT', DIR_VIEWS . 'layouts/default_layout.php');
define('NO_SIDEBAR_LAYOUT', DIR_VIEWS . 'layouts/no_sidebar_layout.php');
define('DIR_PUBLIC', 'http://' . $_SERVER['HTTP_HOST'] . '/Blog-System/public/');

require_once DIR_CONFIG . 'Database.php';
require_once DIR_CONFIG . 'Auth.php';
require_once ROOT . 'App.php';
require_once DIR_MODELS . 'Model.php';
require_once DIR_CONTROLLERS . 'Controller.php';