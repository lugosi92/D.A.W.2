<?php

$array1 = array(
    "imagen12.png", 
    "imagen10.png", 
    "imagen2.png", 
    "img1.png"
);

//A--------- Orden natural 

$clonA = $array1;

natcasesort($clonA);
print_r($clonA);

echo "<br>";

//B--------- Orden normal ascendente manteniendo asociacion clave valor

$clonB = $array1;

asort($clonB);
print_r($clonB);

