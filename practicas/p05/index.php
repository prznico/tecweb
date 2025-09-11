<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:  </p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        echo "NOMBRE DEL HOST: " .$_SERVER['SERVER_NAME'] . "<br>";

        echo "<h3> a. La versión de Apache y PHP utilizando SERVER_SOFTWARE</h3>";
        echo "VERSIONES: " .$_SERVER['SERVER_SOFTWARE'] . "<br>";

        echo "<h3>b. El nombre del sistema operativo (servidor) haciendo uso de: HTTP_USER_AGENT </h3>";
        echo "NOMBRE SO: " .$_SERVER['HTTP_USER_AGENT'] . "<br>";

        echo "<h3>c. El idioma del navegador (cliente) usando HTTP_ACCEPT_LANGUAGE</h3>";
        echo "IDIOMA: " .$_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";


    ?>
</body>
</html>