<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CubePHP\Core\Db;

/**
 * 测试数据库功能
 */
class DbTest extends TestCase
{
    protected $_db;

    /**
     * 初始化数据表
     */
    protected function setUp() : void
    {
        $this->_db = new Db($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);

        //创建表结构
        $query = "CREATE TABLE test (`id` int(10) NOT NULL AUTO_INCREMENT, `key` VARCHAR(64) NOT NULL, PRIMARY KEY (`id`))";
        $this->_db->query($query);

        //插入记录
        $this->insertRecord();
    }

    /**
     * 删除数据表
     */
    protected function tearDown() : void
    {
        $this->_db->query("DROP TABLE test");
    }

    /**
     * 插入记录
     */
    public function insertRecord()
    {
        $v = md5('hello');
        $this->_db->query("insert into test (`key`) values ('{$v}')");
    }

    /**
     * 获取记录测试
     */
    public function testFetchRecord()
    {
        $sql = "select * from test;";
        $rows = $this->_db->fetchAll($sql);

        $this->assertEquals(1, count($rows));
    }
}
