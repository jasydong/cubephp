<?php
namespace CubePHP\Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Log Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Log {
    public static $_logger = null;

    /**
     * 获取Logger实例
     */
    public static function getLogger() {
        if (!self::$_logger) {
            $logger = new Logger('log');
            $date = date("Y-m-d", time());
            $logger->pushHandler(new StreamHandler(ROOT_PATH."/data/logs/{$date}.log"));

            self::$_logger = $logger;
        }

        return self::$_logger;
    }

    /**
     * 添加日志记录(INFO)
     */
    public static function info($message) {
        if (!empty($message)) {
            $logger = self::getLogger();

            // 添加日志记录
            $logger->addRecord(Logger::INFO, $message);
        }
    }

    /**
     * 添加日志记录(DEBUG)
     */
    public static function debug($message) {
        if (!empty($message)) {
            $logger = self::getLogger();

            // 添加日志记录
            $logger->addRecord(Logger::DEBUG, $message);
        }
    }

    /**
     * 添加日志记录(ERROR)
     */
    public static function error($message) {
        if (!empty($message)) {
            $logger = self::getLogger();

            // 添加日志记录
            $logger->addRecord(Logger::ERROR, $message);
        }
    }
}
