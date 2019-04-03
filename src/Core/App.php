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
    /**
     * 初始化
     */
    public static function init() {
        // 注册异常处理
        self::setExceptionHandler();
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
	 * 注册异常处理
	 */
    public static function setExceptionHandler () {
        register_shutdown_function(function() {
            $last = error_get_last();
            if (!empty($last)) {
                $message = isset($last['message']) ? $last['message']:'';
                $file = isset($last['file']) ? $last['file']:'';
                $line = isset($last['line']) ? $last['line']:'';
                Log::error("{$message} in file {$file}(line:{$line})");
            }
        });

        set_error_handler(function($code, $error, $file = null, $line = null) {
            if (error_reporting() & $code) {
                throw new Exception($error, $code);
            }
        });

        set_exception_handler(function($e) {
            if ($e->getMessage())	{
                $message = $e->getMessage();
                $file = $e->getFile();
                $line = $e->getLine();
                $traceString = $e->getTraceAsString();

                Log::error("{$message} in file {$file}(line:{$line})");

                if (!empty($traces)) {
                    Log::error("{$traceString}");
                }

                return true;
            }
        });
    }
}
