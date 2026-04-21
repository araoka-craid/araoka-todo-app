<?php

require_once __DIR__ . "/../strategies/direct-strategy.php";

if (isset($_POST['delete'])) {
    $response = new DeleteResponse();
} else {
    $response = new ViewResponse();
}

$response->ResponseHandler([$_GET['id']]);
