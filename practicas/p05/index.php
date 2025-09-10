<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c </p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo 'a. Ahora muestra el contenido de cada variable';   
        echo '<ul>';
        echo "<li>\$a = $a </li>";
        echo "<li>\$b = $b </li>";
        echo "<li>\$c = $c </li>";
        echo '</ul>';


        echo 'b. Agrega al código actual las siguientes asignaciones: $a = “PHP server”;    $b = &$a;';  
        $a = "PHP server";
        $b = &$a;

        echo '<br>';
        echo 'c. Vuelve a mostrar el contenido de cada uno'; 
        echo '<ul>';
        echo "<li>\$a = $a </li>";
        echo "<li>\$b = $b </li>";
        echo "<li>\$c = $c </li>";
        echo '</ul>';

        echo 'd. Describe y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones';
        echo '<ul>';
        echo "<li>Antes \$a tenia ManejadorSQL ahora \$a ahora vale PHP server, se reasignó su valor";
        echo "<li>Antes \$b se convierte en referencia de \$a (ambas apuntan al mismo lugar)";
        echo "<li>Antes \$c se mantiene con la misma referencia que había tomado de \$a desde el principio y como ahora \$a es PHP server, c tambien lo es";
        echo '</ul>';

    ?>
</body>
</html>