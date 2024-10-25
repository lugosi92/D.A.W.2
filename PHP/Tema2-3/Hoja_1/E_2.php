<?php 
    $a = 7;      // $a vale 7
    $b =& $a;    // $b es una referencia a $a, por lo tanto, $b también vale 7
    $c =& $b;    // $c es una referencia a $b, y como $b referencia a $a, $c también vale 7
    
    echo $a, $b, $c; // Imprime "777" porque $a, $b, y $c apuntan al mismo valor
    
    unset($a);   // Elimina $a, pero $b y $c siguen apuntando al valor original (7)
    $b = 8;      // Cambia el valor de $b a 8. Como $b sigue siendo una referencia a $a, $c también cambia a 8
    
    echo $a, $b, $c; // $a ya no existe, pero $b y $c imprimen "88"
?>
