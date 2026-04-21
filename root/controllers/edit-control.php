<?php

require_once __DIR__ . "/../strategies/direct-strategy.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new EditResponse();
    $data = $_POST;
} else {
    $response = new ViewResponse();
    $data = [$_GET['id']];
}

$response->ResponseHandler($data);
