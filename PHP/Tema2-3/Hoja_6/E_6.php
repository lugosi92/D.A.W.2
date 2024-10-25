<?php

$pila = array(
    "12345678A",
    "87654321B",
    "23456789C",
    "34567890D",
    "45678901E"
);

array_push($pila, '34575421F');
print_r($pila);
echo "<br>";

$arraySin1 = array_shift($pila);
echo "Quitamos el primer dni: " . $arraySin1 . "<br>";
print_r($pila);
echo "<br>";

//forma breve
array_shift($pila);
print_r($pila);


$arraySinUlt = array_pop($pila);
echo "Quitamos el ultimo array: " . $arraySinUlt . "<br>";
print_r($pila);