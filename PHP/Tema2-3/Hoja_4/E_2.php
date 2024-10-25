<?php

$colores =array(
    array("rojo:FF0000 ", "verde:00FF00 ", "azul:0000FF2"),
    array("rosa:FE9ABC ", "amarillo:FDF189 ", "malva:BC8F8F")
);

for($i = 0; $i < count($colores); $i++){
    for($j = 0; $j < count($colores[$i]); $j++){
        echo $colores[$i][$j];
    }
    echo "<br>";
}

