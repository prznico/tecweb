<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create(); 
$app->setBasePath("/tecweb/practicas/p14");

  // GET Hola Mundo
$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello Mundo");
    return $response;
});

// GET PASO DE PARÁMETROS
$app->get('/hola[/{nombre}]', function ($request, $response, $args) {
    $response->getBody()->write("Hola, ".$args["nombre"]);
    return $response;
});

// POST RECIBIENDO DATOS
$app->post('/pruebapost', function ($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->getBody()->write("Valores: ". $val1 ." ".$val2);
    return $response;
});

// JSON
$app->get("/testjson", function($request, $response, $args){
    $data[0]["nombre"] = "Himmel";
    $data[0]["apellido"] = "Blue Sky";
    $data[1]["nombre"] = "Frieren";
    $data[1]["apellido"] = "White Snow";
    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();

?>