<?php

namespace App\Controllers;

class TodoController
{
    private $todo;
    private $validator;

    //各機能を依存注入
    public function __construct($todo, $validator)
    {
        $this->todo = $todo;
        $this->validator = $validator;
    }

    //list.phpへのデータ受け渡し
    public function list($param)
    {
        $tasks = $this->todo->getTasks($param);
        return [
            'tasks' => $tasks
        ];
    }

    //add.phpへの分岐
    public function create()
    {
        return [];
    }

    //Insert用
    public function add($post)
    {
        $errors = $this->validator->validate($post);

        if (!empty($errors)) {
            return [
                'view'   => 'add',
                'errors' => $errors,
            ];
        }

        $params = [
            $post['title'],
            $post['content']
        ];

        $this->todo->addTask($params);
        header('Location: /');
    }

    //Update用
    public function update($post)
    {
        $errors = $this->validator->validate($post);

        if (!empty($errors)) {
            return [
                'data'   => $post,
                'view'   => 'edit',
                'errors' => $errors
            ];
        }

        $params = [
            $post['title'],
            $post['content'],
            $post['id']
        ];

        $this->todo->editTask($params);
        header('Location: /');
    }

    //editとdelete時の既存データ表示時のデータ受け渡し
    public function get($post, $id)
    {
        $data = $this->todo->getTask([$id]);
        return ['data' => $data];
    }

    //delete用
    public function delete($post)
    {
        $param = [
            $post['id']
        ];
        $this->todo->deleteTask($param);
        header('Location: /');
    }
}
