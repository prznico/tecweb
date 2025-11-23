<?php
    namespace MyAPI;
    require_once __DIR__ . '/myapi/Products.php';    

    $products = new Products();

    // Los datos vienen como POST normal
    $name = $_POST['name'] ?? '';

    // Crear el array que espera singleByName
    $products->singleByName($name);
    echo $products->getData();
?>