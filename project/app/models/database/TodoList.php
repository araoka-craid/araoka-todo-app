<?php

namespace App\Models\Database;

class TodoList
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //list用のデータ取得関数
    public function getTasks($param)
    {
        $sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE 1 ORDER BY created_at desc';
        $stmt = $this->db->exec($sql, $param);
        //データの格納
        $tasks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $tasks;
    }

    //editとdelete用のデータ取得関数
    public function getTask($param)
    {
        $sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE id = ?';
        $stmt = $this->db->exec($sql, $param);
        //データの格納
        $tasks = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $tasks;
    }

    //データ追加用の関数
    public function addTask($param)
    {
        $sql = 'INSERT INTO todo_list (title, content) VALUES(?, ?)';
        $this->db->exec($sql, $param);
    }

    //データ削除用の関数
    public function deleteTask($param)
    {
        $sql = 'DELETE FROM todo_list WHERE id = ?';
        $this->db->exec($sql, $param);
    }

    //データ更新用の関数
    public function editTask($param)
    {
        $sql = 'UPDATE todo_list set title = ?, content = ? WHERE id = ?';
        $this->db->exec($sql, $param);
    }
}
