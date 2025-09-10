<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(<datos>).  </p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        $a = "0";       
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);
       
        echo"<h3>Valores booleanos con var_dump </h3>";
        echo "a = ";
        var_dump($a); 
        echo "<br>";

        echo "b = ";
        var_dump($b); 
        echo "<br>";

        echo "c = ";
        var_dump($c); 
        echo "<br>";

        echo "d = ";
        var_dump($d); 
        echo "<br>";

        echo "e = ";
        var_dump($e); 
        echo "<br>";

        echo "f = ";
        var_dump($f); 
        
        echo"<h3>Valores booleanos con para usar echo con c y e </h3>";
        echo "c = " . var_export($c, true) . "<br>"; // Muestra: c = false
        echo "e = " . var_export($e, true) . "<br>"; // Muestra: e = false

    ?>
</body>
</html>