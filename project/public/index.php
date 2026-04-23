<?php

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

//サニタイズ用関数
function h($string)
{
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$routes = require BASE_PATH . "/routes/web.php";


$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($uri, '/'));
$basePath = '/' . ($segments[0] ?? '');
$params = array_slice($segments, 1);

$routeKey = $method . ' ' . $basePath;

if (!isset($routes[$routeKey])) {
    http_response_code(404);
    echo 'Not Found';
    exit;
}

[$controllerName, $action, $viewName] = $routes[$routeKey];

require_once __DIR__ . '/../app/models/database/Database.php';

$database = new \App\Models\Database\Database();
$dbModel = new \App\Models\Database\TodoList($database);
$validator = new \App\Core\Validator();

$fullControllerName = "App\\Controllers\\" . $controllerName;


require_once BASE_PATH . "/app/Controllers/{$controllerName}.php";

$controller = new $fullControllerName($dbModel, $validator);
$strategy = new \App\Core\TodoViewStrategy($controller, $action, $params, $viewName);
$strategy->execute();
