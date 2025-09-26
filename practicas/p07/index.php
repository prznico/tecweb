<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <?php include 'src/funciones.php'; ?>

    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php ejercicio1(); ?>

    <h2>Ejercicio 2</h2>
    <p>Generación de secuencias hasta obtener: Impar, Par, Impar</p>
    <?php ejercicio2(); ?>

    <h2>Ejercicio 3</h2>
    <p>Encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <form method="get">
            <label>Ingresa un número entero:</label>
            <input type="number" name="numero" min="1" max="100" required>
            <input type="submit" value="Buscar">
        </form>
    <?php ejercicio3($_GET['numero']); ?>

    <h2>Ejercicio 4</h2>
    <p>Arreglo con índices 97-122 (letras 'a' a 'z'):</p>
    <?php ejercicio4(); ?>


    <h2>Ejercicio 5</h2>
    <p>Validación de edad y sexo</p>
    <p><a href="ejercicio5.php">Ir al formulario de validación</a></p>



    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>