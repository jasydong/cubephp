<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

//注册异常处理
register_shutdown_function(function() {
	print_r(error_get_last());
});

set_error_handler(function($code, $error, $file = null, $line = null) {
	if (error_reporting() & $code) {
		debug_print_backtrace();
        return true;
	}

	return true;
});

set_exception_handler(function($e) {
	if ($e)	{
		print_r($e);
        return true;
	}
});

//自动加载注册
spl_autoload_register(function($class) {
	//自动加载文件路径
	$autoload = array(
		'CubePHP\App'=>'core/app.php',
		'CubePHP\Request'=>'core/request.php',
        'CubePHP\Controller'=>'core/controller.php',
        'CubePHP\Model'=>'core/model.php',
        'Controller\Index'=>'controller/index.php',
        'Model\Demo'=>'model/demo.php',
	);

	if (isset($autoload[$class])) {
		include_once $autoload[$class];
	}
});


use \CubePHP;
use \Controller;
use \Model;


echo '<pre>';
$request = CubePHP\Request::factory();
$request->execute();
