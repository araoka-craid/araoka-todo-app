<?php

namespace App\Controllers;

use App\Models\Database\TodoList;
use App\Core\Validator;

class TodoController
{
    private $todo;
    private $validator;

    public function __construct(TodoList $todo, Validator $validator)
    {
        $this->todo = $todo;
        $this->validator = $validator;
    }

    public function list($param)
    {
        $tasks = $this->todo->getTasks($param);
        return [
            'tasks' => $tasks
        ];
    }

    public function create()
    {
        return [];
    }

    public function add($post)
    {
        $errors = $this->validator->validate($post);

        if (!empty($errors)) {
            require BASE_PATH . '/app/views/add.php';
            return;
        }

        $params = [
            $post['title'],
            $post['content']
        ];

        $this->todo->addTask($params);
        header('Location: /');
    }

    public function update($post)
    {
        $errors = $this->validator->validate($post);

        if (!empty($errors)) {
            require BASE_PATH . '/app/views/add.php';
            return;
        }

        $params = [
            $post['title'],
            $post['content'],
            $post['id']
        ];

        $this->todo->editTask($params);
        header('Location: /');
    }

    public function get($post, $id)
    {
        $data = $this->todo->getTask([$id]);
        return ['data' => $data];
    }

    public function delete($post)
    {
        $param = [
            $post['id']
        ];
        $this->todo->deleteTask($param);
        header('Location: /');
    }
}
