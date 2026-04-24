<?php

//初期設定//

//プロジェクトのルートディレクトリの絶対パスを定義（書く量を減らす）
define('BASE_PATH', dirname(__DIR__));

//Composerのオートローダーを読み込み（Namespaceとディレクトリ構造による自動索引）
require BASE_PATH . '/vendor/autoload.php';

//サニタイズ用関数(グローバル関数化)
function h($string)
{
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}

// .envファイルを読み込んで環境変数を設定（.envから$_ENVでデータを取得するため）
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//ルーティング設定を読み込み
$routes = require BASE_PATH . "/routes/web.php";

//リクエスト情報の解析
$method = $_SERVER['REQUEST_METHOD'];
//パスの部分の抜き取り(例：/edit)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//URLをスラッシュで分割し、ペースパスとパラメータ（IDなど）に分ける
$segments = explode('/', trim($uri, '/'));
$basePath = '/' . ($segments[0] ?? '');
$params = array_slice($segments, 1);

//ルーティング照合用のキーを作成（例： "Get /edit"）
$routeKey = $method . ' ' . $basePath;

//ルーティングの照合
if (!isset($routes[$routeKey])) {
    http_response_code(404);
    echo 'Not Found';
    exit;
}

//一致したルートから設定を取得
[$controllerName, $action, $viewName] = $routes[$routeKey];

//依存注入用の準備
$database = new \App\Models\Database\Database();
$todo = new \App\Models\Database\TodoList($database);
$validator = new \App\Core\Validator();

//コントローラーの動的実行
$fullControllerName = "App\\Controllers\\" . $controllerName;


//Strategyパターンの実行
$controller = new $fullControllerName($todo, $validator);
$strategy = new \App\Core\TodoViewStrategy($controller, $action, $params, $viewName);
$strategy->execute();
