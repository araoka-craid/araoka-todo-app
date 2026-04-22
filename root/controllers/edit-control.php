<?php

require_once __DIR__ . "/../strategies/direct-strategy.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new EditResponse();
    $data = $_POST;
    $result = $response->ResponseHandler($data);

    if (is_array($result)) {
        $errors = $result;
        include "../views/edit.php";
    } else {
        header("Location: ../controllers/list-control.php");
        exit;
    }

} else {
    $response = new ViewResponse($_GET['action']);
    $data = [$_GET['id']];
    $result = $response->ResponseHandler($data);
    include "../views/edit.php";
}
