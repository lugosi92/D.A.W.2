<?php

$array1=array(
    'IMG0.png', 
    'img12.png', 
    'img10.png', 
    'img2.png',
    'img1.png', 
    'IMG3.png'
);

//A--------- Orden natural (Sensible a mayusculas y minusculas)

natsort($array1);
print_r($array1);

echo "<br>";
//B--------- Orden natural (Insensible a mayusculas y minusculas)

natcasesort($array1);
print_r($array1);