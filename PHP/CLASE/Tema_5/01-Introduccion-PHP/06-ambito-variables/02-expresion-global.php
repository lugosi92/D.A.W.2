<?php
    $x = 10;
    $y = 20;

    function ambito(){
        $x = 1;
        $y = 2;

        echo "Variables funcion ambito: <br>";
        global $x,$y; // con el global, el valor de 'x', 'y' se cambia a las globales
        echo "x = $x <br>";
        echo "y = $y <br>";
    }
    ambito();
    echo "Variables locales: <br>";
    echo "x = $x <br>";
    echo "y = $y <br>";
?>