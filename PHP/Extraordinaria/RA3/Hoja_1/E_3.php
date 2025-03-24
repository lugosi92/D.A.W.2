<?php 
    $a = "var1";  // Se asigna la cadena "var1" a la variable $a
    $$a = "var2"; // Se crea una variable llamada $var1 y se le asigna el valor "var2"
    
    echo $a, $var1; // Imprime "var1var2"
    
    $var2 = "var3"; // Se crea una variable llamada $var2 y se le asigna el valor "var3"
    
    echo $a, $var2; // Imprime "var1var3"
?>