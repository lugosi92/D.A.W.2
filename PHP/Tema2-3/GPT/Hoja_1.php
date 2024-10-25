<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <!-- Define una variable $a con el valor 10. 
    Crea una referencia de $a llamada $b.
    Luego, cambia el valor de $b a 20 y observa el comportamiento de $a. 
    ¿Qué se imprime al final si muestras $a y $b? Explica por qué. -->
    <?php
        $a = 10;
        $b = 20;
        $a = $b;
        echo $a . $b;
        ?>
    <h2>Ejercicio 2</h2>
    <!-- Crea una variable $x con el valor 15. 
    Luego, crea referencias de $x en las variables $y y $z. 
    Cambia el valor de $y a 30. Imprime los valores de $x, $y, y $z.
    ¿Cuál es el resultado y por qué? -->
    <?php
        $x = 15;
        $y = $x;
        $z = $x;
        $y = 30;
        echo $x . $y . $z;
        ?>
    <h2>Ejercicio 3</h2>
    <!-- Define una variable $fruit con el valor "apple". 
    Utiliza una variable variable para definir $apple como "delicious". 
    Imprime el valor de $fruit y de la variable dinámica para ver el resultado. 
    ¿Qué se imprime y por qué? -->
    <?php
        $fruit = "appel";
        $apple = "delicious";

        echo $fruit . "<br>" . $apple;
        ?>
     <h2>Ejercicio 4</h2>
    <!-- Define dos variables, $string1 y $string2, con los valores 'simple quotes' y "double quotes" respectivamente. 
     Crea un script que las imprima usando comillas simples y dobles. ¿Cuál es la diferencia en el resultado?-->
    <?php
        $string1 = "simple quotes";
        $string2 = 'double quotes';

        echo $string1 . "<br>" . $string2;

        ?>
      <h2>Ejercicio 5</h2>
    <!--Crea una variable $num con el valor 100 y haz que $num2 sea una referencia de $num. 
    Utiliza unset para eliminar $num, luego asigna 200 a $num2 y observa el resultado. 
    ¿Qué sucede y por qué?-->
    <?php
        $num = 100;
        $num2 = $num;
        unset($num);
        $num2 = 200;
        echo $num . "<br>" . $num2;
        ?>
      <h2>Ejercicio 6</h2>
    <!--Escribe un script PHP que imprima la palabra "PHP" 10 veces seguidas en la misma línea. 
    Utiliza un bucle for para hacerlo. 
    ¿Qué métodos puedes usar para separar cada palabra por una coma?  -->
    <?php
        $contador = 0;
        for($i = 1; $i <= 10; $i++){
            $contador++;
            echo $contador . "PHP" . "<br>";
        }
        
        ?>
    <h2>Ejercicio 7</h2>
    <!--Declara dos variables, $num1 con el valor -5 y $num2 con el valor 15. 
    Realiza operaciones de suma, resta, multiplicación y división entre las dos variables. 
    Imprime los resultados de cada operación junto con una breve descripción.-->
    <?php
        $num1 = -5;
        $num2 = 15;

        $suma = $num1 + $num2;
        echo $suma;
        ?>
       <h2>Ejercicio 8</h2>
    <!-- Define una variable $data como NULL. 
     Escribe un script que verifique si la variable está vacía o no e imprime un mensaje adecuado. 
     ¿Qué se imprime y por qué?-->
    <?php
       $data = null;

       if(isset($data)){
        echo "Variable correcta";
       }else{
        echo "Variable vacia";
       }
        ?>
      <h2>Ejercicio 9</h2>
    <!--Crea una variable $var con el valor 0. 
    Escribe un script que use isset y empty para verificar el estado de la variable. 
    ¿Cuál es el resultado y cuál es la diferencia entre ambas funciones?-->
    <?php
      $var = 0;
      if(isset($var)){
        echo "Variable correcto";
      }else{
        echo "Variable vacia";
      }

      echo "<br>";
        
      if(empty($var)){
        echo "Correcto, variable vacia";
      }else{
        echo "Variable llena";
      }
        ?>
</body>
</html>

