<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/', function(){
    return "OLAAA";
});

$app->router->get('/leo', function(){
    return "OLAAA";
});

$app->run();