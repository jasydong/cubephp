<?php
namespace CubePHP\Core;

/**
 * Model Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Model {
    // DB实例
    protected $_db = null;
    // 数据库名称
    protected $_db_name = '';
    // 表名称
    protected $_table_name = '';

    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct($config=[]) {
        // 创建DB实例
        $config['db_name'] = $this->_db_name;
        $this->_db = new Mysql($config);

        return $this;
    }

    public static function factory($name='', $config=[]) {
        $className = "CubePHP\\Model\\".ucwords($name);

        if (class_exists($className)) {
            $object = new $className($config);

            return $object;
        }
    }
}
