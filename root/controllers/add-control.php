<?php

require_once __DIR__ . "/../strategies/action-strategy.php";

$strategy = new ActionStrategy($_POST);
$strategy->add();
