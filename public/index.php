<?php

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\SiteController;

require_once __DIR__ . './../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

if(strlen($_ENV['DATA_HASH_KEY']) != 16) {
    echo '<span style="font-size:30px;">ERROR! .ENV DATA_HASH_KEY NEEDS TO BE 16 CHARACTERS LONG!<br><br><strong>LOAD TERMINATED</strong></span>';
    exit;
}

$config = [
    'hashKey' => $_ENV['DATA_HASH_KEY'],
    'userClass' => \app\models\User::class,
    'database' => [
        'host' => $_ENV['DATABASE_HOST'],
        'username' => $_ENV['DATABASE_USERNAME'],
        'password' => $_ENV['DATABASE_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [AuthController::class, 'index']);

// Authentication Routes
$app->router->get('/auth/login', [AuthController::class, 'login']);
$app->router->post('/auth/login', [AuthController::class, 'login']);
$app->router->get('/auth/register', [AuthController::class, 'register']);
$app->router->post('/auth/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

// Home Routes
$app->router->get('/home/dashboard', [SiteController::class, 'dashboard']);
$app->router->get('/home/profile', [SiteController::class, 'profile']);

// Organization management Routes
$app->router->get('/manage/organizations/new', [SiteController::class, 'newOrganization']);
$app->router->post('/manage/organizations/new', [SiteController::class, 'newOrganization']);

$app->run();