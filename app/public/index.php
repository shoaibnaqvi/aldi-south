<?php

use App\Core\Application;

foreach (glob(__DIR__."/../Core/*.php") as $filename)
{
    include_once $filename;
}
require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

$app->run();