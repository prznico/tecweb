<?php
/* MySQL Conexion*/
$link = mysqli_connect("localhost", "root", "N1n1c0l3.", "marketzone");

// Chequea conexion
if($link === false) {
    die("ERROR: No pudo conectarse con la DB. ". mysqli_connect_error());
}

// Recibir y sanitizar datos del formulario
$id = mysqli_real_escape_string($link, $_POST['id']);
$nombre = mysqli_real_escape_string($link, $_POST['nombre']);
$marca = mysqli_real_escape_string($link, $_POST['marca']);
$modelo = mysqli_real_escape_string($link, $_POST['modelo']);
$precio = mysqli_real_escape_string($link, $_POST['precio']);
$detalles = mysqli_real_escape_string($link, $_POST['detalles']);
$unidades = mysqli_real_escape_string($link, $_POST['unidades']);
$imagen = mysqli_real_escape_string($link, $_POST['imagen']);

// Usar imagen por defecto si no se proporcionó ninguna
if (empty($imagen)) {
    $imagen = 'img/imagen.png';
}

// Ejecuta la actualización del registro
$sql = "UPDATE productos SET 
        nombre = '$nombre',
        marca = '$marca',
        modelo = '$modelo',
        precio = $precio,
        detalles = '$detalles',
        unidades = $unidades,
        imagen = '$imagen'
        WHERE id = $id";

if(mysqli_query($link, $sql)) {
    echo "<script>
            alert('Producto actualizado exitosamente.');
            window.location.href = 'get_productos_xhtml_v2.php?tope=100';
          </script>";
} else {
    echo "ERROR: No se ejecuto $sql. ". mysqli_error($link);
}

// Cierra la conexion
mysqli_close($link);
?>