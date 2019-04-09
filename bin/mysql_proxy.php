#!/usr/bin/env php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use CubePHP\Core\MysqlProxyServer;

define('ROOT_PATH', dirname(__DIR__));

// start mysql proxy server
$proxyServer = new MysqlProxyServer();

$proxyServer->start('localhost', '3308');
