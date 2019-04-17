<?php
namespace CubePHP\Core;

use Symfony\Component\Yaml\Yaml;

/**
 * Config Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Config {
    // 缓存
    protected $_cache = [];

    /**
     * 获取配置
     */
    public static function get($name='') {
        $result = '';

        $parts = explode(".", $name);

        if (isset($parts[0]) && !empty($parts[0])) {
            $filePath = CONFIG_PATH . '/'. $parts[0] . '.yml';
            $result = Yaml::parseFile($filePath);

            if (isset($parts[1]) && !empty($parts[1])) {
                $k = $parts[1];
                $result = isset($result[$k]) ? $result[$k] : '';
            }
        }

        return $result;
    }
}
