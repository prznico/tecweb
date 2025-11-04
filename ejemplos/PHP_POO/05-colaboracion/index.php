<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05-Colaboración de clases</title>
</head>
<body>
    <?php
    require_once __DIR__.'/Pagina.php';

    $pag1 = new Pagina('El ático del programador', 'El sótano del programador');
    for($i=0; $i<15; $i++){
        $pag1->insertar_cuerpo('Línea No. ' .($i+1).' en el cuerpo de la pagina');
    }

    $pag1->graficar();

    ?>
</body>
</html>