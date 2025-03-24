<?php

$a = "Hola";
$b = "Holaa";
$c = "Holaaa";

$cadena = array($a, $b, $c);

sort($cadena);

//Concatenar
$cadena = implode (" ", $cadena);

echo $cadena;