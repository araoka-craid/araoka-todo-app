<?php

require_once __DIR__ . '/../models/sanitize.php';
require_once __DIR__ . '/../models/connect.php';

class ShowStrategy extends Sanitization
{
    private $param;

    public function __construct($id)
    {
        $connection = new Connect();
        $param = $connection->getTask($id);
        $this->param = $this->sanitize($param);
    }

    public function show()
    {
        $data = $this->param;
        include "../views/edit.php";
    }
}
