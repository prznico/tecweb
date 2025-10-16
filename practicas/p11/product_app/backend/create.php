<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
     if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        // VALIDAR QUE EL JSON SE HAYA DECODIFICADO CORRECTAMENTE
        if ($jsonOBJ === null) {
            echo '[SERVIDOR] Error: JSON inválido';
            exit;
        }
        
        // VALIDAR QUE EXISTAN TODOS LOS CAMPOS REQUERIDOS
        if (!isset($jsonOBJ->nombre) || !isset($jsonOBJ->marca) || !isset($jsonOBJ->modelo) || 
            !isset($jsonOBJ->precio) || !isset($jsonOBJ->unidades)) {
            echo '[SERVIDOR] Error: Faltan campos requeridos en el JSON';
            exit;
        }
        
        // ESCAPAR LOS DATOS PARA PREVENIR SQL INJECTION
        $nombre = mysqli_real_escape_string($conexion, $jsonOBJ->nombre);
        $marca = mysqli_real_escape_string($conexion, $jsonOBJ->marca);
        $modelo = mysqli_real_escape_string($conexion, $jsonOBJ->modelo);
        $precio = floatval($jsonOBJ->precio);
        $unidades = intval($jsonOBJ->unidades);
        $detalles = isset($jsonOBJ->detalles) ? mysqli_real_escape_string($conexion, $jsonOBJ->detalles) : '';
        $imagen = isset($jsonOBJ->imagen) ? mysqli_real_escape_string($conexion, $jsonOBJ->imagen) : 'img/imagen.png';
        
        // VALIDAR SI EL PRODUCTO YA EXISTE (mismo nombre y no eliminado)
        $sql_verificar = "SELECT id FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
        $result_verificar = $conexion->query($sql_verificar);
        
        if ($result_verificar && $result_verificar->num_rows > 0) {
            // EL PRODUCTO YA EXISTE Y NO ESTÁ ELIMINADO
            echo '[SERVIDOR] Error: Ya existe un producto activo con el nombre: ' . $nombre;
        } else {
            // EL PRODUCTO NO EXISTE O ESTÁ ELIMINADO, PROCEDER CON LA INSERCIÓN
            
            // PREPARAR LA SENTENCIA SQL PARA INSERTAR
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                    VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";
            
            // EJECUTAR LA INSERCIÓN
            if ($conexion->query($sql)) {
                echo '[SERVIDOR] Producto insertado correctamente. ID: ' . $conexion->insert_id;
            } else {
                echo '[SERVIDOR] Error al insertar producto: ' . $conexion->error;
            }
        }
        
        // CERRAR CONEXIÓN SI EXISTE
        if ($result_verificar) {
            $result_verificar->free();
        }
        $conexion->close();
        
    } else {
        // NO SE RECIBIÓ NINGÚN DATO
        echo '[SERVIDOR] Error: No se recibieron datos del producto';
    }
        echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
?>