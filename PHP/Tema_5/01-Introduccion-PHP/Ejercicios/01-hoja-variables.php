<!-- 
    Ejercicio 1:
    Indica la salida por pantalla del siguiente script:
-->

<?php 
    $a=7;
    $b=&$a;
    $c=&$b;
    echo "<h1>Ejercicio 1: </h1> <br/>";
    echo   $a,$b,$c; // como $a está vinculado en $b y $c, la salida será 777
    $b=8;
    echo $a,$b,$c; // como $b está vinculado en $c y $a, la salida será 888
?>

<!-- 
    Ejercicio 3:
    Indica la salida por pantalla del siguiente script:
-->

<?php 
    $a=7;
    $b=&$a;
    $c=&$b;
    echo "<h1>Ejercicio 2: </h1> <br>";
    echo   $a,$b,$c;
    unset($a);
    $b=8;
    if(!$a) echo $a,$b,$c; // como se elimina $a, la salida será 88
?>

<!-- 
    Ejercicio 3:
    Indica la salida por pantalla del siguiente script:
-->

<?php 
    $a="var1";
    $$a="var2"; // $$a = $var1
    echo "<h1>Ejercicio 3: </h1> <br/>";
    echo   $a, $var1;
    $$var2="var3";
    echo $a,$var2;
?>

<!-- 
    Ejercicio 4:
    Hacer un programa en PHP que escriba tu nombre (en negrita) y la ciudad dónde naciste.
-->
<?php
    $name = "Neil";
    $city = "Madrid";
    echo "<h1>Ejercicio 4: </h1> <br/>";
    echo "<strong>$name</strong>";
    echo "<p>$city</p>";
?>

<!-- 
    Ejericio 5:
    Detectar siete errores en el siguiente código:
-->
<?php
 	// $x = -1; 
 	// $y = 9;
 	// $suma = x + y; // faltan los dos $ en las variables. 2 errores
 	// print("El valor de x es <i>$x<i>") // print no es una función en php y falta un punto y coma; 2 errores
 	// <br /> // no está imprimiento el br en el HTML 1 error
 	// print("El valor de y es <i>$y</i><br />"; // print no es una función en php; 1 error
 	// print("La suma es <b><i>$suma</i></b><br />"); // print no es una función en php; 1 error
?>

<!-- 
    Ejericio 6:
    Hacer un programa en PHP que calcule el área de un círculo de radio 2.5 cms. Utilizar una constante para PI.
-->

<?php  
    define("PI", 3.14);
    $radius = 2.5 ;

    $area = PI * pow($radius, 2);

    echo "<h1>Ejercicio 6: </h1> <br/>";
    echo "El radio es $radius <br/>";
    echo "El area es $area";
?>

<!-- 
    Ejericio 7:
    Indica la salida del siguiente código:
-->

<?php 
    $dato="prueba";
    echo "<h1>Ejercicio 7: </h1> <br/>";
    echo 'El contenido de la variable $dato es $dato <br/>'; // con '' se imprime el nombre de la variable
    echo "El contenido de la variable $dato es $dato"; // con "" se imprime el contenido de la variable
?>

<!-- 
    Ejercicio 8:
     Obtén el script PHP para la siguiente salida por pantalla de dos formas diferentes: escapando las comillas y sin escapar las comillas
        Aquí se pueden añadir comillas “dobles”
        Aquí se pueden añadir comillas ‘simples’ 
-->

<?php 
    echo "<h1>Ejercicio 8: </h1> <br/>";
    echo "Aquí se pueden añadir comillas \"dobles\" <br/>"; // con '' se imprime el nombre de la variable
    echo "Aquí se pueden añadir comillas 'simples'"; // con "" se imprime el contenido de la variable
?>


<!--
    Ejercicio 9:
    Completa el siguiente script
-->
<?php
    $variable=NULL;
    echo "<h1>Ejercicio 9: </h1> <br/>";
    if ($variable)  echo '$variable es ' . $variable;
    else echo '$variable es NULL';
?>

<!--
    Ejercicio 10:
    Declara en un script una variable de tipo coma flotante con su valor correspondiente mostrando por pantalla su contenido y su tipo.
    Cambia el tipo de la variable a boolean y muestra su contenido y su tipo.
-->

<?php
    $ejericio9 = 2.18;
    echo 'El tipo de $ejercicio9 es ' . gettype($ejercicio9) . " y el valor es $ejercicio9";
    if ($variable)  echo '$variable es ' . $variable;
    else echo '$variable es NULL';
?>