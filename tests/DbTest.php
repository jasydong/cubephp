<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CubePHP\Core\Mysql;

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
        $config = [];
        $config['mysql_host'] = $GLOBALS['DB_HOST'];
        $config['mysql_port'] = $GLOBALS['DB_PORT'];
        $config['mysql_user'] = $GLOBALS['DB_USER'];
        $config['mysql_password'] = $GLOBALS['DB_PASSWD'];
        $config['mysql_charset'] = $GLOBALS['DB_CHARSET'];
        $config['db_name'] = $GLOBALS['DB_DBNAME'];

        $this->_db = new Mysql($config);

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
        $rows = $this->_db->query($sql);

        $this->assertEquals(1, count($rows));
    }
}
