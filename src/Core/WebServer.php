<?php
namespace CubePHP\Core;

use Workerman\Worker;

/**
 * WebServer Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class WebServer {
    public function start($host='127.0.0.1', $port='2346') {
        $webServer = new Worker("http://{$host}:{$port}");
        $webServer->count = 4; // 4个并发进程
        $webServer->name = 'WebServer';
        $webServer->onMessage = function($connection) {
            // 运行
            $result = App::runForWebServer();
            // 发送结果
            $connection->send($result);
            unset($result);
        };

        // 运行worker
        Worker::runAll();
    }
}
