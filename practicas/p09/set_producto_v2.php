<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Registro de Producto</title>
		<style type="text/css">
			body {margin: 20px; 
			background-color: #e3e6ddff;
			font-family: Verdana, Helvetica, sans-serif;
			font-size: 90%;}
			h1 {color: #3498db;
			border-bottom: 1px solid #005825;}
			h2 {font-size: 1.2em;
			color: #4A0048;}
			.success {color: #005825; font-weight: bold;}
			.error {color: #FF0000; font-weight: bold;}
			.product-info {background-color: #E8F4D9; padding: 15px; margin: 10px 0; border-radius: 5px;}
		</style>
	</head>
	<body>
		<h1>REGISTRO DE PRODUCTO</h1>

		<?php
		/** SE CREA EL OBJETO DE CONEXIÓN */
		@$link = new mysqli('localhost', 'root', 'N1n1c0l3.', 'marketzone');
		
		/** comprobar la conexión */
		if ($link->connect_errno) {
			echo '<p class="error">Falló la conexión: '.$link->connect_error.'</p>';
		} else {
			// Recibir los datos del formulario
			$nombre = $link->real_escape_string($_POST['nombre']);
			$marca = $link->real_escape_string($_POST['marca']);
			$modelo = $link->real_escape_string($_POST['modelo']);
			$precio = floatval($_POST['precio']);
			$detalles = $link->real_escape_string($_POST['detalles']);
			$unidades = intval($_POST['unidades']);
			$imagen = $link->real_escape_string($_POST['imagen']);

			// VALIDACIÓN: Verificar que nombre, marca y modelo no existan en la BD
			$sql_validation = "SELECT COUNT(*) as count FROM productos 
							  WHERE nombre = '{$nombre}' 
							  AND marca = '{$marca}' 
							  AND modelo = '{$modelo}' ";
			
			$result_validation = $link->query($sql_validation);
			
			if ($result_validation) {
				$row = $result_validation->fetch_assoc();
				
				if ($row['count'] > 0) {
					echo '<p class="error">ERROR: Ya existe un producto con el mismo nombre, marca y modelo en la base de datos.</p>';
				} else {
					// INSERTAR usando column names (sin id )
					$sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
								   VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

					if ($link->query($sql_insert)) {
						$nuevo_id = $link->insert_id;
						echo '<p class="success">¡Producto insertado correctamente con ID: '.$nuevo_id.'!</p>';
						
						echo '<div class="product-info">';
						echo '<h2>Información del Producto Registrado:</h2>';
						echo '<ul>';
						echo '<li><strong>ID:</strong> <em>'.$nuevo_id.'</em></li>';
						echo '<li><strong>Nombre:</strong> <em>'.$nombre.'</em></li>';
						echo '<li><strong>Marca:</strong> <em>'.$marca.'</em></li>';
						echo '<li><strong>Modelo:</strong> <em>'.$modelo.'</em></li>';
						echo '<li><strong>Precio:</strong> <em>$'.number_format($precio, 2).'</em></li>';
						echo '<li><strong>Unidades:</strong> <em>'.$unidades.'</em></li>';
						echo '<li><strong>Imagen:</strong> <em>'.$imagen.'</em></li>';
                        echo '<li><strong>Estado:</strong> <em>Activo (eliminado = 0)</em></li>';
						echo '</ul>';
						echo '<p><strong>Detalles del producto:</strong> <em>'.$detalles.'</em></p>';
						echo '</div>';
					} else {
						echo '<p class="error">ERROR: El producto no pudo ser insertado. '.$link->error.'</p>';
					}
				}
			} else {
				echo '<p class="error">ERROR en la validación: '.$link->error.'</p>';
			}

			$link->close();
		}
		?>

		<p>
			<a href="formulario_productos.html">Regresar al formulario de registro</a>
		</p>
		<p>
		    <a href="http://validator.w3.org/check?uri=referer"><img
		      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
		</p>
	</body>
</html>