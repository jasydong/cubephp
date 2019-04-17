<?php
/**
 * Index
 *
 * @package    CubePHP
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use CubePHP\Core\App;

error_reporting(E_ALL);
ini_set("display_errors", true);

define('ROOT_PATH', dirname(__DIR__));
define('CONFIG_PATH', ROOT_PATH . '/config');


// 运行
App::run();
