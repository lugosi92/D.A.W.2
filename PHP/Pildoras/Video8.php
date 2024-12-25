<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables estaticas</title>

    <style>

        .resaltar{
            color: #F00;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
/*------------------------------------VIDEO 8 STRINGS---------------------------------------------------*/

/* 
    1. Formas de declarar
    2. Formas de comparar
*/
// echo "<p class = "resaltar">Esto es un ejemplo</p>" //ERROR
echo "<p class = 'resaltar'>Esto es un ejemplo</p>"; //OK!
echo "<p class = \"resaltar\">Esto es un ejemplo</p>"; //ESCAPANDO COMILLAS

/* COMPARAR
0 si coincide, 1 o -1 si no coincide */


$variable1 = "CASA";
$variable2 = "casa";

$resultado = strcmp($variable1, $variable2); // Sensible a mayúsculas y minúsculas
echo $resultado . "\n";

$resultado2 = strcasecmp($variable1, $variable2); // Ignora mayúsculas y minúsculas
echo $resultado2 . "\n";




?>
</body>
</html>