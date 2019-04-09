<?php
namespace CubePHP\Core;

use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

/**
 * Mysql Proxy Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class MysqlProxyServer {
    protected $_mysql_host = 'localhost';
    protected $_mysql_port = '3306';

    public function start($host='127.0.0.1', $port='2346') {
        $mysqlProxy = new Worker("tcp://{$host}:{$port}");
        $mysqlProxy->count = 8; // 8个并发进程
        $mysqlProxy->name = 'MysqlProxyServer';
        $mysqlProxy->onConnect = function($connection) {
            // get client ip
            $client_ip = $connection->getRemoteIp();
            echo "client_ip::{$client_ip}\n";
            // 建立3306端口的异步连接
            $connection_to_mysql = new AsyncTcpConnection("tcp://{$this->_mysql_host}:{$this->_mysql_port}");
            // 设置将当前客户端连接的数据导向3306端口的连接
            $connection->pipe($connection_to_mysql);
            // 设置3306端口连接返回的数据导向客户端连接
            $connection_to_mysql->pipe($connection);
            // 执行异步连接
            $connection_to_mysql->connect();
        };

        // 运行worker
        Worker::runAll();
    }
}
