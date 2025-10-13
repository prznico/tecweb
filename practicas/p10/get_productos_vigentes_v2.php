<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
	if(isset($_GET['eliminado']))
    {
		$eliminado = $_GET['eliminado'];
    }
    else
    {
        die('Parámetro "eliminado" no detectado...');
    }

    // Validar que eliminado sea numérico
	if (!is_numeric($eliminado)) {
		die('El parámetro "eliminado" debe ser 1 o 0');
	}

    $productos = [];

	if ($eliminado==1 || $eliminado==0)
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'N1n1c0l3.', 'marketzone');	

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		$stmt = $link->prepare("SELECT * FROM productos WHERE eliminado = ?");
		$stmt->bind_param("i", $eliminado);
		$stmt->execute();
		$result = $stmt->get_result();

		/** Obtener todos los productos */
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$productos[] = $row;
		}

		$result->free();
		$stmt->close();
		$link->close();
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos Vigentes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h3>PRODUCTOS - ELIMINADO = <?= $eliminado ?></h3>

			<br/>
			
			<?php if( count($productos) > 0 ) : ?>

				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
						<th scope="col">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Marca</th>
						<th scope="col">Modelo</th>
						<th scope="col">Precio</th>
						<th scope="col">Unidades</th>
						<th scope="col">Detalles</th>
						<th scope="col">Imagen</th>
						<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($productos as $row): ?>
							<tr id="row-<?= $row['id'] ?>">
								<th scope="row"><?= $row['id'] ?></th>
								<td class="row-data"><?= $row['nombre'] ?></td>
								<td class="row-data"><?= $row['marca'] ?></td>
								<td class="row-data"><?= $row['modelo'] ?></td>
								<td class="row-data">$<?= number_format($row['precio'], 2) ?></td>
								<td class="row-data"><?= $row['unidades'] ?></td>
								<td class="row-data"><?= utf8_encode($row['detalles']) ?></td>
								<td><img src="<?= $row['imagen'] ?>" width="50" height="50"></td>
								<td>
									<button class="btn btn-warning btn-sm" onclick="editarProducto(<?= $row['id'] ?>)">Editar</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

			<?php else : ?>

				<div class="alert alert-warning">
					No se encontraron productos con estado eliminado = <?= $eliminado ?>.
				</div>

			<?php endif; ?>
		</div>

		<script>
			function editarProducto(id) {
				// Obtener todos los datos de la fila
				var row = document.getElementById('row-' + id);
				var data = row.querySelectorAll('.row-data');
				
				var nombre = data[0].innerHTML;
				var marca = data[1].innerHTML;
				var modelo = data[2].innerHTML;
				var precio = data[3].innerHTML.replace('$', '').replace(',', '');
				var unidades = data[4].innerHTML;
				var detalles = data[5].innerHTML;
				var imagen = row.querySelector('img').src;
				
				// Guardar datos en sessionStorage
				sessionStorage.setItem('edit_id', id);
				sessionStorage.setItem('edit_nombre', nombre);
				sessionStorage.setItem('edit_marca', marca);
				sessionStorage.setItem('edit_modelo', modelo);
				sessionStorage.setItem('edit_precio', precio);
				sessionStorage.setItem('edit_unidades', unidades);
				sessionStorage.setItem('edit_detalles', detalles);
				sessionStorage.setItem('edit_imagen', imagen);
				sessionStorage.setItem('edit_accion', 'editar');
				
				// Redirigir al formulario
				window.location.href = 'formulario_productos_v2.html';
			}
		</script>
	</body>
</html>