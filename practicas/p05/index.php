<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>


<!-- EJERCICIO 1  

<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>
</body>
-->

<!-- EJERCICIO 2  

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
-->

<!-- EJERCICIO 3  

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
-->

<!-- EJERCICIO 4  

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

-->

<!-- EJERCICIO 5  

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
-->

<!-- EJERCICIO 6  

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

-->

<!-- EJERCICIO 7  -->
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