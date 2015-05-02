<?php

define('ROOT', dirname(__FILE__) . '\\');

define('DIR_ROOT', basename(dirname(__FILE__)));
define('DIR_MODELS', ROOT . 'models\\');
define('DIR_VIEWS', ROOT . 'views\\');
define('DIR_CONTROLLERS', ROOT . 'controllers\\');
define('FILE_LAYOUT', DIR_VIEWS . 'layout.php');
define('DIR_PUBLIC', 'http://' . $_SERVER['HTTP_HOST'] . '\\Blog-System\\public\\');

require_once ROOT . 'App.php';
require_once DIR_CONTROLLERS . 'Controller.php';
