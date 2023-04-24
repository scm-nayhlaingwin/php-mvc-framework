<?php
require_once __DIR__.'/../vendor/autoload.php';

use \app\controllers\HomeController;
use \app\controllers\ContactController;
use app\controllers\AuthController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

// $app->router->get('/contact', function () {
//     return "Contact";
// });
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'store']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();