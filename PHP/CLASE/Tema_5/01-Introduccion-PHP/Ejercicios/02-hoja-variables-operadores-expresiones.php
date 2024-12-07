<!-- 
    Ejercicio 1:
    Indica la salida ;
-->

<?php
    $a = 8;
    $b = 3;
    $c = 3;

    echo "<h1>Ejercicio 1: </h1> <br/>";

    echo $a == $b , "<br>"; // FALSE (nada)
    echo $a != $b , "<br>"; // TRUE (1)
    echo $a < $b , "<br>"; // FALSE (nada)
    echo $a > $b , "<br>"; // TRUE (1)
    echo $a >= $c , "<br>"; // TRUE (1)
    echo $a <= $c , "<br>"; // FALSE (nada)
?>

<!-- 
    Ejercicio 2:
    Indica la salida ;
-->

<?php
    $a = 8;
    $b = 3;
    $c = 3;

    echo "<h1>Ejercicio 2: </h1> <br/>";

    echo ($a == $b) && ($c > $b) , "<br>"; // FALSE (nada)
    echo ($a == $b) || ($b == $c) , "<br>"; // TRUE (1)
    echo !($b <= $c) , "<br>"; // FALSE (nada)
?>

<!-- 
    Ejercicio 3:
    Indica la salida ;
-->

<?php 
    $precioneto = 101.98;
    $iva = 0.196;
    $resultado = $precioneto * $iva;
    /**
     * El precio es de 101.98 y el IVA el 0.196%
     * Resultado: 19.99 (resultado aproximado de solo con dos decimales) con ROUND()
     * 19,98808
     * normal
     * 
     * Usando la funcion SPRINTF se ve asi: 19.99 (devuelve un string acorde al fomrato del primer argumento)
     */
     
    echo "<h1>Ejercicio 3: </h1> <br/>";
    echo "El precio es de ";
    echo $precioneto;
    echo " y el IVA el ";
    echo $iva;
    echo "% <br>";
    echo "Resultado: " ;
    echo round($resultado,2);
    echo " con ROUND() <br>";
    echo $resultado;
    echo " normal \n";
    echo "<br><br>";
    $resultado2= sprintf("%01.1f", $resultado);
    echo "Usando la funcion SPRINTF se ve asi: ";
    echo $resultado2  
?>

<!-- 
    Ejercicio 4:
    La funcion RAND nos retorna un valor aleatorio entre un rango de dos enteros:
    $num = rand(1,100). Hacer un programa que almacene en la variable $num un valor
    entero generado en forma aleatoria entre 1 y 100 y lo muestre por pantalla. Mostrar
    además si es menor o igual a 50 o si es mayor. Utilizar para ello el operador
    condición?acción1:acción2 como estructura alternativa. 
-->

<?php
    $randNumber = rand(100,1000);
    $number = 50;

    echo "<h1>Ejercicio 4: </h1> <br/>";
    echo "Numero random: $randNumber <br> Numero a comparar: $number<br><br>";

    $mensaje = ($randNumber <= $number) ? "$randNumber es MENOR que $number" : "$randNumber es MAYOR que $number";
    echo $mensaje;
?>

<!-- 
    Ejercicio 5:
    Completa el siguiente codigo
-->

<?php
    $var="prueba";
    echo "<h1>Ejercicio 5: </h1> <br/>";
    if (isset($var)) echo "Esta declarada <br>";
    if (empty($var)) echo "No hay nada en la variable <br>";
    unset($var);
    if (isset($var)) echo "No exite <br>";
    if (empty($var)) echo "No hay contentido <br>";
    $var="foo";
    if ((bool) $var) echo "? <br>";
    if (!empty($var)) echo "Hay contenido";
?>


<!-- 
    Ejercicio 6:
    Completa:
-->

<?php
    echo "<h1>Ejercicio 6: </h1> <br/>";
    echo "Hecho en la hoja";
    $var = null;
    echo "hola: ".(bool)$var;
?>

<!-- 
    Ejercicio 9:
    Completa:
-->
<?php
    echo "<h1>Ejercicio 9: </h1> <br/>";
    $a=3;
    $a+=5;
    $b=$a++; // Primero se asigna $b y luego incrementa $a
    echo $b, $a;
    $b=++$a;
    echo $b, $a;
    
?>

<?php
    $num1 = 9;
    $num2 = 3;
    
    $result = $num1/$num2;
    echo "<h1>Ejercicio 10: </h1> <br/>";
    echo "$num1/$num2 es igual a $result. El tipo de $resutl es ";
    echo var_dump($result);
?>