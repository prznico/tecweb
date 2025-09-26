<?php 
    function ejercicio1(){
        if(isset($_GET['numero']))
                {
                    $num = $_GET['numero'];
                    if ($num%5==0 && $num%7==0)
                    {
                        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
                    }
                    else
                    {
                        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
                    }
                }
    }


    function ejercicio2() {
        $matriz = [];
        $iteraciones = 0;
        
        do {
            $iteraciones++;
            $fila = [rand(100, 999), rand(100, 999), rand(100, 999)];
            $matriz[] = $fila;
        } while (!($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0));
        
        // Mostrar resultados
        echo "<h3>Secuencias generadas:</h3>";
        foreach ($matriz as $i => $fila) {
            echo ($i + 1) . ". " . implode(', ', $fila) . "<br>";
        }
        
        $totalNumeros = $iteraciones * 3;
        echo "<p><strong>$totalNumeros números obtenidos en $iteraciones iteraciones</strong></p>";
    }
?>