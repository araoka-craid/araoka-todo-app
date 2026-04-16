<?php

class Connect
{
    public const DB_NAME = "todo_app";
    public const HOST = "localhost";
    public const USER = "root";
    public const PASS = "root";

    private $dbh;

    public function __construct()
    {
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB_NAME.";charset=utf8mb4";
        try {
            $this->dbh = new PDO($dsn, self::USER, self::PASS);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function query($sql, $param)
    {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($param);
        return $stmt;
    }
}
