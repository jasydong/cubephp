<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CubePHP\Core\Config;

define('CONFIG_PATH', dirname(__DIR__) . '/config');

/**
 * 测试配置功能
 */
class ConfigTest extends TestCase
{
    /**
     * 配置测试
     */
    public function testConfig()
    {
        $dbconfig = Config::get('app.database');

        $this->assertEquals(1, isset($dbconfig['mysql_host']));
    }
}
