<?php

//データベース接続
class Connect
{
    //外部から閲覧のみ可能
    public const DB_NAME = "todo_app";
    public const HOST = "localhost";
    public const USER = "root";
    //外部からの閲覧・変更不可
    private const PASS = "root";

    private $dbh;

    public function __construct()
    {
        //データソース
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB_NAME.";charset=utf8mb4";

        try {
            $this->dbh = new PDO($dsn, self::USER, self::PASS);
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

    //list用のデータ取得関数
    public function getTasks($param)
    {
        $sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE 1 ORDER BY created_at desc';
        //SQL文の読み込み (or'1'='1'といった攻撃の無効化)
        $stmt = $this->exec($sql, $param);
        //データの格納
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }

    //editとdelete用のデータ取得関数
    public function getTask($param)
    {
        $sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE id = ?';
        $stmt = $this->exec($sql, $param);
        $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tasks;
    }

    //データ追加用の関数
    public function addTask($param)
    {
        $sql = 'INSERT INTO todo_list (title, content) VALUES(?, ?)';
        $this->exec($sql, $param);
    }

    //データ削除用の関数
    public function deleteTask($param)
    {
        $sql = 'DELETE FROM todo_list WHERE id = ?';
        $this->exec($sql, $param);
    }

    //データ更新用の関数
    public function editTask($param)
    {
        $sql = 'UPDATE todo_list set title = ?, content = ? WHERE id = ?';
        $this->exec($sql, $param);
    }

}
