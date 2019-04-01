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

    public static function run () {
        // 初始化
        static::init();

        // 处理请求
        $request = Request::factory();
        $request->execute();
    }

    /**
	 * 注册异常处理
	 */
    public static function setExceptionHandler () {
        register_shutdown_function(function() {
            $last = error_get_last();
            if (!empty($last)) {
                Log::debug(json_encode($last));
            }
        });

        set_error_handler(function($code, $error, $file = null, $line = null) {
            if (error_reporting() & $code) {
                Log::error("{$error} in file {$file}(line:{$line})");
            }

            return true;
        });

        set_exception_handler(function($e) {
            if ($e->getMessage())	{
                $message = $e->getMessage();
                $file = $e->getFile();
                $line = $e->getLine();
                $traces = $e->getTrace();

                Log::error("{$message} in file {$file}(line:{$line})");

                if (!empty($traces)) {
                    //print_r($traces);
                }

                return true;
            }
        });
    }
}
