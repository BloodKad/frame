<?php
error_reporting(-1);

$query = rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/');

define('WWW', __DIR__);
define('CORE', dirname(WWW) . '/vendore/core');
define('ROOT', dirname(WWW));
define('APP', dirname(WWW) . '/app');
define('LAYOUT', 'default');

require '../vendor/libs/functions.php';
require '../vendor/libs/debug/debug.php';
//require '../vendor/core/router.php';

use vendor\core\router;

spl_autoload_register(function($class){
	$file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
	//$file = APP . '/controllers/' . $class . '.php';
	if(is_file($file))
	{
		require_once $file;
	}
});

//Router::add('^index/(?P<action>[a-z-]+)?/?(?P<alias>[a-z-]+)?$', ['controller' => 'Main']);
Router::add('^index/(?P<alias>[a-z-]+)?$', ['controller' => 'Main', 'action' => 'view']);
// default routes
Router::add('^$', ['controller' => 'Main']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


Router::dispatch($query);
