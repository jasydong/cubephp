<?php
namespace CubePHP\Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Log Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Log {
    // 日志实例
    public static $_logger = null;
    // 日志格式
    public static $_format = "%datetime% %channel%.%level_name% %message%\n";

    /**
     * 获取Logger实例
     */
    public static function getLogger() {
        if (!self::$_logger) {
            $date = date("Y-m-d", time());
            // 创建日志实例
            $logger = new Logger('logger');
            $streamHandler = new StreamHandler(ROOT_PATH . "/data/logs/{$date}.log");
            // 设置日志格式
            $streamHandler->setFormatter(new LineFormatter(self::$_format));
            $logger->pushHandler($streamHandler);

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
