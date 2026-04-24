<?php

namespace App\Core;

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

        if (isset($data['view'])) {
            $this->viewName = $data['view'];
        }

        $view = $data['view'] ?? $this->viewName;

        if ($view) {
            if (is_array($data)) {
                extract($data);
            }
            require BASE_PATH . "/resources/views/{$view}.php";
        }
    }
}
