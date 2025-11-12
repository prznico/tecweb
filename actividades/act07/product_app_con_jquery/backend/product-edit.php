<?php
    namespace MyAPI;

    require_once __DIR__ . '/myapi/Products.php';    
    
    $products = new Products();
    //leer json y convertirlo a objeto php
    $json = file_get_contents('php://input');
    $producto = json_decode($json);

    //ejecutar add y devolver respuesta
    $products->edit($producto);
    echo $products->getData();
?>