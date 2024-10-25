<?php
$a = "Hola";
$b = "Holaa";
$c = "Holaaa";

$resultado = $a;

if($b > $a) $resultado = $b;
if($c > $a) $resultado = $c;

echo $resultado;
