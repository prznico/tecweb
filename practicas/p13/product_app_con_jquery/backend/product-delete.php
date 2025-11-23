<?php
    namespace MyAPI;
    require_once __DIR__ . '/myapi/Products.php';    

    $products = new Products();

    // Los datos vienen como POST normal
    $id = $_POST['id'] ?? '';

    // Crear el array que espera el método delete
    $producto = array('id' => $id);

    $products->delete($producto);
    echo $products->getData();
?>