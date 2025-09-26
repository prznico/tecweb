<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Validación</title>
</head>
<body>
    <h1>Ejercicio 5: Validación de edad y sexo</h1>
    
    <?php include 'src/funciones.php'; ?>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $edad = intval($_POST['edad']);
        $sexo = $_POST['sexo'];
        
        $mensaje = validarPersona($edad, $sexo);
        echo "<h2>Resultado:</h2>";
        echo "<p>$mensaje</p>";
        echo "<a href='ejercicio5.php'>Volver a intentar</a>";
    } else {
    ?>
    
    <form method="POST">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="1" max="120" required>
        <br><br>
        
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Selecciona...</option>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br><br>
        
        <button type="submit">Validar</button>
    </form>
    
    <?php } ?>
    
    <br>
    <a href="index.php">Volver al índice</a>
</body>
</html>