<?php

require_once __DIR__ . "/../strategies/direct/add-strategy.php";

$strategy = new AddStrategy($_POST);
$result = $strategy->add();

if ($result['status'] === 'error') {
    $errors = $result['errors'];
    include '../views/add.php';
} else {
    header("Location: ../controllers/list-control.php");
    exit;
}
