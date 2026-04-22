<?php

require_once __DIR__ . "/../../models/validate.php";
require_once __DIR__ . "/../../models/database/todo_list.php";

class AddStrategy
{
    private $errors;
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
        $validate = new Validator();
        $this->errors = $validate->validate($this->param);
    }

    public function add()
    {
        if (!empty($this->errors)) {
            //エラー時用
            $errors = $this->errors;
            include '../views/add.php';
        } else {
            //データベースとの接続
            $database = new TodoList();
            $data = [$this->param['title'], $this->param['content']];
            $database->addTask($data);
        }
    }
}
