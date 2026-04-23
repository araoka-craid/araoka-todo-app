<?php

namespace App\core;

class TodoViewStrategy
{
    private $controller;
    private $action;
    private $params;
    private $viewName;

    public function __construct($controller, $action, $params, $viewName)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
        $this->viewName = $viewName;
    }

    public function execute()
    {
        $data = $this->controller->{$this->action}($_POST, ...$this->params);

        if ($this->viewName) {
            if (is_array($data)) {
                extract($data);
            }
            require BASE_PATH . "/resources/views/{$this->viewName}.php";
        }
    }
}
