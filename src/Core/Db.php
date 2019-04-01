<?php
namespace CubePHP\Core;

/**
 * DB Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
 */
class Db {
    // PDO实例
    protected $_pdo;

    public function __construct($dsn='', $user='', $pass='') {
        if (!empty($dsn)) {
            $pdo = new \PDO($dsn, $user, $pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->_pdo = $pdo;
        }
    }

    public function fetchOne($sql) {
        $result = [];

        if (!empty($sql)) {
            $pdo = $this->_pdo;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function fetchAll($sql) {
        $result = [];

        if (!empty($sql)) {
            $pdo = $this->_pdo;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
