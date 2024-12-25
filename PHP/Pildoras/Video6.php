<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambitos</title>
</head>
<body>
<?php
/*------------------------------------VIDEO 6 PHP MYSQL---------------------------------------------------*/

/*
    VARIABLES
        Local -> Se declara en la funcion y solo funciona hay
        Global -> Se declara en cualquier parte y se accede en cualquier parte
        Super global -> Accesible desde fuera (Formularios...)
*/

// Variable global
 $nombre = "Juan";

//  Variable local 
    include ("fnombre.php");

echo "$nombre <br>";
dameNombre();


/* Las 2 variables son distinta memoria, 
para hacer que se puedan usar en ambos (funcion y variable normal, se usa global*/


$nombre1 = "Juan";

function dameNombre1(){

    global $nombre1;

    $nombre1 = "El nombre es " . $nombre1;
    echo $nombre1;
}

echo " <br> $nombre1 <br>";
dameNombre1();



?>
</body>
</html>