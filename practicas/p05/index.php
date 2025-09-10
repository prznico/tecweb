<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:  </p>
    <p>$a = “7 personas”;   $b = (integer) $a;   $a = “9E3”;  $c = (double) $a;</p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        $a = "7 personas";
        echo "\$a = $a <br>";
        $b = (integer) $a;
        echo "\$b = $b <br>";
        $a = "9E3";
        echo "\$a = $a <br>";
        $c = (double) $a;
        echo "\$c = $c <br>";

        echo "<h3>Valores finales de las variables </h3>";
        echo "\$a = $a <br>";
        echo "tipo: " .gettype($a) ."<br>";
        echo "\$b = $b <br>";
        echo "tipo: " .gettype($b) ."<br>";
        echo "\$c = $c <br>";
        echo "tipo: " .gettype($c) ."<br>";
        

    ?>
</body>
</html>