<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    
    echo "Mi primer proyecto <br>"; 

    echo "Hola curso <br>";

    echo "Hasta la prxima <br>";

 /*------------------------------------VIDEO 4 VARIABLES Y COMENTARIOS---------------------------------------------------*/
    /*
        1. Comentarios
        2. Variables 
        3. Imprimir
    */

    // 1. Comentario
 
    // 2. Variables (Su valor cambia durante la ejecucion dle programa)
        // $1nombre -> No es valido , no puede empezar por numeros
            //Comilla simple ->  interpreta literlamente
            //Comilla doble ->  interpreta variables en un string 

    $nombre = "Juan";
    $edad = 18;

    // 3. Imprimir (print o echo && concatenacion )

    print "El nombre de usuario es : " .  $nombre . "<br>";
    print "La edad de $nombre es $edad <br> ";
    

/*------------------------------------VIDEO 5 FDLUJO DE EJECUCION---------------------------------------------------*/
   /*
        1. Crear servidorde pruebas (XAMP- VScode)
        2. Introduccion funciones y flujo ejeccion 
        3. Introduccion include y requiere
    */

    /* 2
    El flujo va de arriba abajo, 
    la unica vez que se ve alterado con condiconales, funciones y bucles*/

    // Las funciones se pueden aislar

    function dameDatos(){

        echo "CONTENIDO DE LA FUNCION <br>";
    }
   
    dameDatos();
    dameDatos();
    dameDatos();
    ?>

<?php 
 /* 3
    Para agregar archivos externoos coomo fopciones.php
        innclude si no el archivo sigue ejecutando
        require si no existe el archivo deja de ejecutar*/

    include ("fopciones.php");
    require ("fopciones.php");

    
    opciones();
    ?>


</body>
</html>