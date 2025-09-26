<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Parque Vehicular</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Ejercicio 6: Parque Vehicular</h1>
    
    <?php include 'src/funciones.php'; ?>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
            // Búsqueda por matrícula
            $matricula = strtoupper($_POST['matricula']);
            $vehiculo = buscarVehiculoPorMatricula($matricula);
            
            if ($vehiculo) {
                echo "<h2>Vehículo encontrado:</h2>";
                echo "<table>";
                echo "<tr><th>Matrícula</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Propietario</th><th>Ciudad</th><th>Dirección</th></tr>";
                echo "<tr>";
                echo "<td>$matricula</td>";
                echo "<td>{$vehiculo['Auto']['marca']}</td>";
                echo "<td>{$vehiculo['Auto']['modelo']}</td>";
                echo "<td>{$vehiculo['Auto']['tipo']}</td>";
                echo "<td>{$vehiculo['Propietario']['nombre']}</td>";
                echo "<td>{$vehiculo['Propietario']['ciudad']}</td>";
                echo "<td>{$vehiculo['Propietario']['direccion']}</td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo "<p>No se encontró ningún vehículo con la matrícula: $matricula</p>";
            }
        } else {
            // Mostrar todos los vehículos
            $parque = obtenerParqueVehicular();
            
            echo "<h2>Todos los vehículos registrados:</h2>";
            echo "<table>";
            echo "<tr><th>Matrícula</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Propietario</th><th>Ciudad</th><th>Dirección</th></tr>";
            
            foreach ($parque as $matricula => $vehiculo) {
                echo "<tr>";
                echo "<td>$matricula</td>";
                echo "<td>{$vehiculo['Auto']['marca']}</td>";
                echo "<td>{$vehiculo['Auto']['modelo']}</td>";
                echo "<td>{$vehiculo['Auto']['tipo']}</td>";
                echo "<td>{$vehiculo['Propietario']['nombre']}</td>";
                echo "<td>{$vehiculo['Propietario']['ciudad']}</td>";
                echo "<td>{$vehiculo['Propietario']['direccion']}</td>";
                echo "</tr>";
            }
            echo "</table>";
            
            echo "<h3>Estructura del arreglo:</h3>";
            echo "<pre>";
            print_r($parque);
            echo "</pre>";
        }
        
        echo "<a href='ejercicio6.php'>Realizar otra consulta</a>";
    } else {
    ?>
    
    <form method="POST">
        <h3>Consultar vehículo por matrícula:</h3>
        <label for="matricula">Matrícula (formato: LLLNNNN):</label>
        <input type="text" id="matricula" name="matricula" pattern="[A-Za-z]{3}[0-9]{4}" 
               title="Formato: 3 letras seguidas de 4 números" placeholder="Ej: ABC1234">
        <button type="submit">Buscar</button>
        
        <h3>O ver todos los vehículos:</h3>
        <button type="submit" name="todos" value="1">Mostrar todos los vehículos</button>
    </form>
    
    <?php } ?>
    
    <br>
    <a href="index.php">Volver al índice</a>
</body>
</html>
