<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables estaticas</title>
</head>
<body>
<?php
/*------------------------------------VIDEO 7 VARIABLES ESTATICAS---------------------------------------------------*/

/* Cuando finaliza la ejecucion de una fucion el valor de las variables locales se destruye,
para evitar esto se usa static (valor se conserva)*/

function incrementar(){

    static $contador = 0;

    $contador++;

    echo $contador . "<br>";
}
for($i = 0; $i < 10; $i++){
    incrementar();
}


?>
</body>
</html>