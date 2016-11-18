<?php

//自动加载注册
spl_autoload_register(function($class) {
	//自动加载文件路径
	$autoload = array(
		'CubePHP\App'=>'src/app.php',
		'CubePHP\Request'=>'src/request.php',
	);

	if (isset($autoload[$class])) {
		include_once $autoload[$class];
	}
});

use CubePHP\App;
use CubePHP\Request;

$app = new CubePHP\App();
var_dump($app->getVersion());

