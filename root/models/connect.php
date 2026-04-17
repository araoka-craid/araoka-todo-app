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
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function query($sql, $param)
    {
        //SQL文の読み込み (or'1'='1'といった攻撃の無効化)
        $stmt = $this->dbh->prepare($sql);
        //SQLの実行
        $stmt->execute($param);
        return $stmt;
    }
}
