<?php

require_once __DIR__ . "/action-strategy.php";
require_once __DIR__ . "/show-strategy.php";
require_once __DIR__ . "/../models/connect.php";

class EditResponse
{
    public function ResponseHandler($params)
    {
        $strategy = new ActionStrategy($params);
        $strategy->edit();
        header("Location:../controllers/list-control.php");
        exit;
    }
}

class DeleteResponse
{
    public function ResponseHandler($params)
    {
        $connection = new Connect();
        $connection->deleteTask($params);
        header("Location:../controllers/list-control.php");
        exit;
    }
}

class ViewResponse
{
    public function ResponseHandler($params)
    {
        $strategy = new ShowStrategy($params);
        $strategy->show();
    }
}
