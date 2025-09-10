<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo): </p>
    
    <?php
        //AQUI VA MI CÓDIGO PHP
        $a = "PHP5";
        echo "\$a = $a";
        echo '<br>';
        echo 'tipo: ' . gettype($a);
        echo '<br><br>';
        
        $z[] = &$a; 
        echo "\$z[] = ";
        print_r($z); // se usa print_r() imprimir para arrays
        echo '<br>';
        echo 'tipo: ' . gettype($z);
        echo '<br><br>';

        $b = "5a version de PHP";
        echo "\$b = $b";
        echo '<br>';
        echo 'tipo: ' . gettype($b);
        echo '<br><br>';

        @$c = $b*10;
        echo "\$c = $c";
        echo '<br>';
        echo 'tipo: ' . gettype($c);
        echo '<br><br>';

        $a .= $b;
        echo "\$a = $a";
        echo '<br>';
        echo 'tipo: ' . gettype($a);
        echo '<br><br>';

        @$b *= $c;
        echo "\$b = $b";
        echo '<br>';
        echo 'tipo: ' . gettype($b);
        echo '<br><br>';

        $z[0] = "MySQL";
        echo "\$z[0] = $z[0]";
        echo '<br>';
        echo 'tipo: ' . gettype($z[0]);
        echo '<br><br>';
        echo 'Array completo: ';
        print_r($z); 


    ?>
</body>
</html>