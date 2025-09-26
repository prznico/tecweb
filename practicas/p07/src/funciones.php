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


    function ejercicio3($numero){
        //verifica que el numero sea mayor a 0
        if ($numero <= 0) {
            return [
                'encontrado' => false,
                'mensaje' => 'Error: El múltiplo debe ser un número positivo mayor a 0',
                'intentos' => 0,
                'numero' => null
            ];
        }
        

        echo "<h4>Usando ciclo WHILE</h4>";
        $intentos = 0;
        $numeroEncontrado = null;
        $encontrado = false;

        while (!$encontrado) {
            $intentos++;
            $numeroAleatorio = rand(1, 1000); 
            
            if ($numeroAleatorio % $numero == 0) {
                $encontrado = true;
                $numeroEncontrado = $numeroAleatorio;
                echo "Intento $intentos: $numeroAleatorio  MÚLTIPLO ENCONTRADO!";
                echo "<br>";
                echo "Por lo tanto <strong>  $numeroAleatorio es multiplo de $numero </strong>";
            }   
        }
        
        echo "<h4>Usando ciclo DO-WHILE</h4>"; 
        $intentosDoWhile = 0;
        $numDoWhile = null;
    
        do {
            $intentosDoWhile++;
            $numAleatorio = rand(1, 1000);
            
            if ($numAleatorio % $numero == 0) {
                $numDoWhile = $numAleatorio;
                echo "Intento $intentosDoWhile: $numAleatorio  MÚLTIPLO ENCONTRADO!";
                echo "<br>";
                echo "Por lo tanto <strong>  $numAleatorio es multiplo de $numero </strong>";
            } 
            
        } while ($numDoWhile === null);
    
    }


    function ejercicio4(){
        // Crear arreglo 
        $arreglo = [];
        for ($ascii = 97; $ascii <= 122; $ascii++) {
            $arreglo[$ascii] = chr($ascii);
        }
        
        echo "<table border='1' style='border-collapse: collapse; margin: 10px 0;'>";
        echo "<tr><th>Índice</th><th>chr(índice)</th><th>Valor</th></tr>";
        
        foreach ($arreglo as $indice => $valor) {
            echo "<tr>";
            echo "<td style='padding: 5px;'>$indice</td>";
            echo "<td style='padding: 5px;'>chr($indice)</td>";
            echo "<td style='padding: 5px; text-align: center; font-size: 20px; font-weight: bold;'>$valor</td>";
            echo "</tr>";
        }
        
        echo "</table>";

    }
?>