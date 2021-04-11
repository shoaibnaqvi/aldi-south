<?php

use App\Core\Application;

foreach (glob(__DIR__."/../Core/*.php") as $filename)
{
    include_once $filename;
}

foreach (glob(__DIR__."/../Controllers/*.php") as $filename)
{
    include_once $filename;
}

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [\App\Controllers\IndexController::class, 'home']);

$app->router->get('/impressum', [\App\Controllers\IndexController::class, 'impressum']);

$app->router->get('/overview', [\App\Controllers\IndexController::class, 'overview']);

$app->router->get('/login', [\App\Controllers\IndexController::class, 'login']);

$app->router->post('/signIn', [\App\Controllers\IndexController::class, 'signIn']);

$app->router->get('/logout', [\App\Controllers\IndexController::class, 'logout']);

$app->router->get('/createNewBlogPost', [\App\Controllers\IndexController::class, 'createNewBlogPost']);

$app->router->get('/insertBlogPost', [\App\Controllers\IndexController::class, 'insertBlogPost']);

$app->run();