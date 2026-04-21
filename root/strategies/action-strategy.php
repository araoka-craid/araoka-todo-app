<?php

require_once __DIR__ . "/../models/validate.php";
require_once __DIR__ . "/../models/connect.php";

class ActionStrategy extends Validator
{
    private $errors;
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
        $this->errors = parent::validate($this->param);
    }

    public function add()
    {
        if (!empty($this->errors)) {
            //エラー時用
            include '../views/add.php';
        } else {
            //データベースとの接続
            $connection = new Connect();
            $data = [$this->param['title'], $this->param['content']];
            $connection->addTask($data);
            include '../controllers/list-control.php';
        }
    }

    public function edit()
    {
        if (!empty($this->errors)) {
            //エラー時用
            include '../views/edit.php';
        } else {
            //データベースとの接続
            $connection = new Connect();
            $data = [$this->param['title'], $this->param['content'], $this->param['id']];
            $connection->editTask($data);
        }
    }

}
