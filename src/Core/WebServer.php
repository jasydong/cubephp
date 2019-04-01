<?php
namespace CubePHP\Core;

use Workerman\Worker;

class WebServer {
    public function start($host='0.0.0.0', $port='1234') {
        $mysqlTask = new Worker("http://{$host}:{$port}");
        $mysqlTask->count = 4; // 4个并发进程
        $mysqlTask->name = 'WebServer';
        $mysqlTask->onMessage = function($connection) {
            // 运行
            $result = App::runForWebServer();
            // 发送结果
            $connection->send($result);
        };

        // 运行worker
        Worker::runAll();
    }
}
