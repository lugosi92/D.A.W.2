<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambitos</title>
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
echo $resultado . "<br>";

$resultado2 = strcasecmp($variable1, $variable2); // Ignora mayúsculas y minúsculas
echo $resultado2 . "<br>";

$operacion = "suma";
$resultado3 = strcasecmp("Suma", $operacion);

echo $resultado3;
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

/*------------------------------------VIDEO 11 Operadores matematicos---------------------------------------------------*/

/* 
    + 
    -
    *
    /
    %
    ++  +=
    -- -=
*/

if(isset($_POST["button"])){

    $numero1 = (float) $_POST["num1"]; // Convertir a número flotante
    $numero2 = (float) $_POST["num2"];

    $operacion = $_POST["operacion"];

    $resultado = null;

    if(strcasecmp("Suma", $operacion) == 0){
        $resultado = $numero1 + $numero2;
    }else if(strcasecmp("Resta", $operacion) == 0){
        $resultado = $numero1 - $numero2;
    }else if(strcasecmp("Multiplicación", $operacion) == 0){
        $resultado = $numero1 * $numero2;
    }else if(strcasecmp("División", $operacion) == 0){
        $resultado = $numero1 / $numero2;
    }else if(strcasecmp("Módulo", $operacion) == 0){
        $resultado = $numero1 % $numero2;
    }else{
        echo "Mal";
    }

    echo $resultado;
}
/*------------------------------------VIDEO 14 CASTING---------------------------------------------------*/

/* 
   1. Funciones matematicas
   2. Casting (implicito-> interpreta las variables)

    CONSTANTE: Espacio en la memoria que no cambia de valor
    SIEMPRE MAYUSCULAS, NO $, ES GLOBAL,VALOR 
*/

/*
. Rand tiene 2 argumentos
*/

$num1 = rand(10,50);
$num2 =pow(5,3);

round($num1);
echo "El nuero es: " . $num1 . "<br>";
echo "El nuero es: " . $num2;

// Casting explicito

$num3="5";

$resultado = (int) $num3;



/*------------------------------------VIDEO 20-21 FUNCIONES---------------------------------------------------*/

function cambia_mayus(&$param){ //el & sirve para pasar la referencia, entonces lo que se modifique en un lado estara en otro

    $param=strolower($param);
    
    return $param;
}

$cadena = "hOLa MunDo";

echo cambia_mayus($cadena);

?>



</body>
</html>