<?php
    $x = 10;
    $y = 20;

    function ambito(){
        $x = 1;
        $y = 2;

        echo "Variables funcion ambito: <br>";
        echo "x = $x <br>";
        echo "y = $y <br>";
    }
    ambito();
    echo "Variables globales: <br>";
    echo "x = $x <br>";
    echo "y = $y <br>";
?>