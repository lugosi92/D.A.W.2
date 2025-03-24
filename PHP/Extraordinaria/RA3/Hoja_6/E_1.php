<?php

$array = array(
    'k0' => 'Juan',
    'k1' => 'Álvaro',
    'k2' => 'Maite',
    'k3' => 'Álvaro',
    'k4' => 'Juan',
    'k5' => 'Martina'
);

$juan = array_search('Juan', $array);
echo "Juan se encuentra en la clave ";
print_r($juan);

echo "<br>";

$alvaro = array_keys($array, 'Álvaro');
echo "Alvaro se encuentra en la claves";
print_r($alvaro);