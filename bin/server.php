#!/usr/bin/env php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use CubePHP\Core\WebServer;

define('ROOT_PATH', dirname(__DIR__));

// start webserver
$webServer = new WebServer();

$webServer->start('0.0.0.0', '2346');
