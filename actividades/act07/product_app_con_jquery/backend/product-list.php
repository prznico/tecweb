<?php
    namespace MyAPI;

    require_once __DIR__ . '/myapi/Products.php';    
    
    $products = new Products();

    //ejecutar add y devolver respuesta
    $products->listProduct();
    echo $products->getData();
?>