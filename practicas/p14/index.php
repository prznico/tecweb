<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create(); 
$app->setBasePath("/tecweb/practicas/p14");


$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello Mundo");
    return $response;
});

$app->run();

?>