<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP. </p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        @$c = $b * 10;
        $a .= $b;
        @$b *= $c;
        $z[0] = "MySQL";

        echo "<h3>Usando modificador global:</h3>";
        
        function mostrarVariables() {
            global $a, $b, $c, $z;
            
            echo "\$a = $a (tipo: " . gettype($a) . ")<br>";
            echo "\$b = $b (tipo: " . gettype($b) . ")<br>";
            echo "\$c = $c (tipo: " . gettype($c) . ")<br>";
            echo "\$z = ";
            print_r($z);
            echo " (tipo: " . gettype($z) . ")<br>";
        }
        
        mostrarVariables();

    ?>
</body>
</html>