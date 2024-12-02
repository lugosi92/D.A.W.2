<!-- 
    Ejercicio 1:
    Dadas tres variables enteras $a, $b, $c, visualizar la mayor. Resolverlo con dos if
    compactos.
-->

<?php
    $a = 0;
    $b = 1;
    $c = 2;
    $mayor = $a;

    if($mayor > $b) $mayor = $b;
    if($mayor > $c) $mayor = $c;

    echo "<h1>Ejercicio 1: </h1> <br/>";
    echo $mayor . "<br/>";

?>


<!-- 
    Ejercicio 2:
    Dadas tres variables string $a, $b, $c a las que se asignan tres cadenas cualesquiera escribe
    un código php que visualice la cadena de mayor longitud.
-->

<?php
    $a = "h";
    $c = "ho";
    $b = "hol";

    $mayor = $a;

    if($mayor < $b) $mayor = $b;
    if($mayor < $c) $mayor = $c;

    echo "<h1>Ejercicio 2: </h1> <br/>";
    echo $mayor . "<br/>";
    ?>

<!-- 
    Ejercicio 3:
    Escribir un código que genere un número aleatorio entre 1 y 100 y visualice si es par o
    impar
    
    -->
    
<?php
    $num = rand(1,100);
    echo "<h1>Ejercicio 3: </h1> <br/>";
    echo "El numero es $num <br>";
    echo ($num % 2 == 0) ? "Es par" : "Es impar";
    
    ?>

<!-- 
    
Ejercicio 4:
La función date(“D”) devuelve un día de la semana en el formato “Mon”, “Tue”,... Escribe un
código php que evalue la expresión devuelta por la función date() y visualice el nombre
completo del día en castellano. Utiliza switch.

-->

<?php
    $date = date("D");
    $name = "";
    switch($date){
        case "Mon":
            $name = "Lunes";
            break;
        case "Tue":
            $name = "Martes";
            break;
        case "Wes":
            $name = "Miercoles";
            break;
        case "Thu":
            $name = "Jueves";
            break;
        case "Fri":
            $name = "Viernes";
            break;
        case "Sat":
            $name = "Sabado";
            break;
        case "Sun":
            $name = "Domingo";
            break;

    }

    echo "<h1>Ejercicio 4: </h1> <br/>";
    echo $name;
?>

<!-- 
    Ejercicio 5:
    Escribe un código que dadas tres variables string $a, $b, $c las concatene de forma que la
    primera sea la de menor longitud, la segunda la siguiente de menor longitud y la tercera la de
    mayor longitud.
-->

<?php
    
    $a = "hol";
    $c = "h";
    $b = "hsasaol";

    $mayor = $a;
    $mediano = $b;
    $menor = $c;

    if($mayor < $b) $mayor = $b;
    if($mayor < $c) $mayor = $c; // ya tengo el mayor

    if($menor > $a) $menor = $a;
    if($menor > $c) $menor = $c;

    if($menor !== $a && $mayor !== $a ) $mediano = $a; 
    if($menor !== $b && $mayor !== $b ) $mediano = $b; 
    if($menor !== $c && $mayor !== $c ) $mediano = $c; 

    echo "<h1>Ejercicio 5: </h1> <br/>";
    echo "El mayor es " . $mayor . "<br/>";
    echo "El mediano es " . $mediano . "<br/>";
    echo "El menor es " . $menor . "<br/>";
    
    ?>

<!-- 
    Ejercicio 6:
    Escribe un código php que visualice los números impares del 1 al 99 en el formato 1-3-…
    excluyendo el 5 y los múltiplos de 5. (continue) 
-->
<?php
    echo "<h1>Ejercicio 6: </h1> <br/>";
    for($i = 1; $i <= 99; $i++){
        if($i % 2 == 0 || $i % 5 == 0) continue;
        echo ($i >= 99) ? "$i" : "$i-";
    }
    ?>

<!-- 
    Ejercicio 7:
    Escribe un código php que calcule y visualice el factorial de un número entero. Realizar dos
    versiones: a) con while b) con do-while 
    -->
    
<?php
    $number= 10;
    $result = 1;
    echo "<h1>Ejercicio 7: </h1> <br/>";
    // while ($number > 0) {
    //     $result *= $number--;
    // }

    do {
        $result *= $number--;
    }while ($number > 0);

    echo "el factorial es $result";
?>
