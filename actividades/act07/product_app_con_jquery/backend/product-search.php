<?php
    namespace MyAPI;
    require_once __DIR__ . '/myapi/Products.php';    

    $products = new Products();

    $search = $_POST['search'] ?? '';

    // Crear el array que espera el método search
    $producto = array('search' => $search);

    $products->search($producto);
    echo $products->getData();
?>