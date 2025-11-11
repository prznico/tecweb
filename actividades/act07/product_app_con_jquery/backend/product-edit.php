    <?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = '{$jsonOBJ->precio}', detalles = '{$jsonOBJ->detalles}', unidades = '{$jsonOBJ->unidades}', imagen = '{$jsonOBJ->imagen}' WHERE id = {$jsonOBJ->id}";

        // Execute the statement
        if ($conexion->query($sql) === TRUE) {
            $data['status'] =  "success";
            $data['message'] =  "Producto editado correctamente";
        } else {
            $data['message'] = "ERROR: No se ejecutó la consulta. " . $conexion->error;
        }

        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
    ?>