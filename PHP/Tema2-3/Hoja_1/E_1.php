<?php 
$a = 7;      // Se asigna 7 a $a
$b =& $a;    // $b es una referencia a $a, ahora $b y $a son el mismo valor en memoria
$c =& $b;    // $c también es una referencia a $b, y por lo tanto, a $a

echo $a, $b, $c; // Imprime 777 porque todos apuntan al mismo valor (7)

unset($a);   // $a deja de existir, pero $b y $c siguen apuntando al valor 7
$b = 8;      // Como $b aún es una referencia, cambiar $b afecta también a $c (ahora ambos son 8)

echo $a, $b, $c; // Imprime un "warning" porque $a ha sido eliminado, pero imprime 88 (por $b y $c)
?>