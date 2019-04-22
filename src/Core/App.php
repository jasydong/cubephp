<?php
namespace CubePHP\Core;


/**
 * App Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class App {
    // 环境变量
    public static $env = 'local';

    /**
     * 初始化
     */
    public static function init() {
        // 加载配置
        self::loadConfig();

        // 注册异常处理(美化错误信息)
        self::registerWhoopsHandler();
    }

    /**
     * 运行
     */
    public static function run() {
        // 初始化
        static::init();

        // 处理请求
        $request = Request::factory();
        $request->execute();
    }

    /**
     * 加载配置
     */
    public static function loadConfig() {
        $config = Config::get('app');

        if (isset($config['env']) && !empty($config['env'])) {
            self::$env = $config['env'];
        }
    }

    /**
     * 运行(用于WebServer)
     */
    public static function runForWebServer() {
        // 处理请求
        $request = Request::factory();
        // 开启Buffer
        ob_start();
        $request->execute();
        // 获取缓冲区内容
        $content = ob_get_clean();
        unset($request);

        return $content;
    }

    /**
	 * 注册异常处理(美化错误信息)
	 */
    public static function registerWhoopsHandler() {
        $whoops = new \Whoops\Run;

        // 错误页
        if (self::$env != 'product') {
            $handler = new \Whoops\Handler\PrettyPageHandler;
            $whoops->pushHandler($handler);
        } else { //记录到日志
            $logger = Log::getLogger();
            $handler = new \Whoops\Handler\PlainTextHandler($logger);
            $handler->loggerOnly(true);
            $whoops->pushHandler($handler);
        }

        $whoops->register();
    }
}
