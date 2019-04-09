<?php
namespace CubePHP\Core;

use Workerman\MySQL\Connection;

/**
 * Mysql Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Mysql extends Connection {
    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct($config) {
        $host = isset($config['mysql_host']) ? $config['mysql_host'] : 'localhost';
        $port = isset($config['mysql_port']) ? $config['mysql_port'] : '3306';
        $user = isset($config['mysql_user']) ? $config['mysql_user'] : 'root';
        $password = isset($config['mysql_password']) ? $config['mysql_password'] : '123456';
        $charset = isset($config['mysql_charset']) ? $config['mysql_charset'] : 'utf8';
        $db_name = isset($config['db_name']) ? $config['db_name'] : '';

        parent::__construct($host, $port, $user, $password, $db_name, $charset);
    }
}
