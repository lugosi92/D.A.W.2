<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CONSTANTES </title>

</head>
<body>
<?php
/*------------------------------------VIDEO 10 CONSTANTES---------------------------------------------------*/

/* 
   1. Declarar constantes
   2. Constantes propias y definidas

    CONSTANTE: Espacio en la memoria que no cambia de valor
    SIEMPRE MAYUSCULAS, NO $, ES GLOBAL,VALOR 
*/

// define("NOMBRE_CONSTANTE", valor )

define("AUTOR", "Khaled"); 

echo "El autor es :" . AUTOR . "<br>";


// CONSTANTES DEFINIDAS https://www.php.net/manual/es/language.constants.magic.php

echo "La linea de esta instruccion es: " . __LINE__ . "<br>";

echo "La ruta del fichero es: " . __FILE__;

?>
</body>
</html>