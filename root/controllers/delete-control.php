<?php

require_once __DIR__ . "/../strategies/direct-strategy.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $response = new DeleteResponse();
        $id = $_POST['id'];
    }
} else {
    $action = $_GET['action'] ?? 'edit';
    $response = new ViewResponse($action);
    $id = $_GET['id'];
}

$response->ResponseHandler([$id]);
