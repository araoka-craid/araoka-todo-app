<?php

namespace App\Models\Database;

use PDO;
use Exception;

//データベース接続
class Database
{
    private $dbh;

    public function __construct()
    {
        $config = require __DIR__ . '/../../../config/database.php';
        //データソース
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->dbh = new PDO($dsn, $config['user'], $config['password']);
        } catch (Exception $e) {
            //エラーメッセージの表示
            exit($e->getMessage());
        }
        //アラート機能の追加
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //SQLの実行用関数
    public function exec($sql, $param)
    {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($param);
        return $stmt;
    }
}
