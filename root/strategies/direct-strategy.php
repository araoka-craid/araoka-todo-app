<?php

require_once __DIR__ . "/./direct/show-strategy.php";
require_once __DIR__ . "/../models/database/todo_list.php";

interface Direction
{
    public function ResponseHandler($params);
}

class EditResponse implements Direction
{
    private $errors;
    private $param;

    public function ResponseHandler($params)
    {

        $this->param = $params;
        $validator = new Validator();
        $this->errors = $validator->validate($this->param);

        if (!empty($this->errors)) {
            //エラー時用
            return $this->errors;
        } else {
            //データベースとの接続
            $database = new TodoList();
            $data = [$this->param['title'], $this->param['content'], $this->param['id']];
            $database->editTask($data);
            return true;
        }
    }
}

class DeleteResponse implements Direction
{
    public function ResponseHandler($params)
    {
        $database = new TodoList();
        return $database->deleteTask($params);
    }
}

class ViewResponse implements Direction
{
    public function ResponseHandler($params)
    {
        $database = new TodoList();
        $data = $database->getTask([$params['id']]);
        $sanitize = new Sanitization();
        return $sanitize->sanitize($data);
    }
}
