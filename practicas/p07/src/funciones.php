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


    function validarPersona($edad, $sexo) {
        if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
            return "Bienvenida, usted está en el rango de edad permitido.";
        } else {
            return "Lo sentimos, no cumple con los requisitos establecidos.";
        }
    }

    //ejercicio 6
    function obtenerParqueVehicular() {
        $parqueVehicular = array(
        'ABC1234' => array(
            'Auto' => array(
                'marca' => 'TOYOTA',
                'modelo' => 2022,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'María González López',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Reforma 123'
            )
        ),
        'DEF5678' => array(
            'Auto' => array(
                'marca' => 'HONDA',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Carlos López Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel'
            )
        ),
        'GHI9012' => array(
            'Auto' => array(
                'marca' => 'NISSAN',
                'modelo' => 2021,
                'tipo' => 'hachback'
            ),
            'Propietario' => array(
                'nombre' => 'Ana Martínez Ruiz',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '25 poniente 456'
            )
        ),
        'JKL3456' => array(
            'Auto' => array(
                'marca' => 'FORD',
                'modelo' => 2019,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Pedro Ramírez Sánchez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '14 sur 789'
            )
        ),
        'MNO7890' => array(
            'Auto' => array(
                'marca' => 'CHEVROLET',
                'modelo' => 2023,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Laura Díaz Hernández',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '5 norte 234'
            )
        ),
        'PQR1235' => array(
            'Auto' => array(
                'marca' => 'VOLKSWAGEN',
                'modelo' => 2018,
                'tipo' => 'hachback'
            ),
            'Propietario' => array(
                'nombre' => 'Jorge Silva Castro',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '33 oriente 567'
            )
        ),
        'STU6789' => array(
            'Auto' => array(
                'marca' => 'MAZDA',
                'modelo' => 2022,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Sofía Vargas Romero',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '12 poniente 890'
            )
        ),
        'VWX2345' => array(
            'Auto' => array(
                'marca' => 'KIA',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Miguel Torres Jiménez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Juárez 345'
            )
        ),
        'YZA7891' => array(
            'Auto' => array(
                'marca' => 'HYUNDAI',
                'modelo' => 2020,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Elena Castro Mendoza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '7 sur 123'
            )
        ),
        'BCD3457' => array(
            'Auto' => array(
                'marca' => 'BMW',
                'modelo' => 2023,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Roberto Navarro Ortiz',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '45 poniente 678'
            )
        ),
        'EFG8912' => array(
            'Auto' => array(
                'marca' => 'MERCEDES-BENZ',
                'modelo' => 2022,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Carmen Reyes Gutiérrez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '21 norte 901'
            )
        ),
        'HIJ4568' => array(
            'Auto' => array(
                'marca' => 'AUDI',
                'modelo' => 2021,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Fernando Morales Cruz',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '9 oriente 234'
            )
        ),
        'KLM9123' => array(
            'Auto' => array(
                'marca' => 'SUBARU',
                'modelo' => 2019,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Patricia Ortega Vega',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '18 sur 567'
            )
        ),
        'NOP5679' => array(
            'Auto' => array(
                'marca' => 'MITSUBISHI',
                'modelo' => 2020,
                'tipo' => 'hachback'
            ),
            'Propietario' => array(
                'nombre' => 'Ricardo Guzmán Flores',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '27 poniente 890'
            )
        ),
        'QRS2346' => array(
            'Auto' => array(
                'marca' => 'RENAULT',
                'modelo' => 2022,
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Gabriela Paredes Ríos',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '3 norte 123'
            )
        )
    );
    
    return $parqueVehicular;
    }

    function buscarVehiculoPorMatricula($matricula) {
        $parque = obtenerParqueVehicular();
        
        if (isset($parque[$matricula])) {
            return $parque[$matricula];
        } else {
            return null;
        }
    }

?>