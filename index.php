<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\Core\Application;

$app = new Application();

//
$app->router->get('/', 'home');
//
$app->router->get('/contact', [\app\Core\Controllers\ContactController::class, 'index']);

$app->router->post('/contact', function ()  {
    return "Contact";
});

$app->run();