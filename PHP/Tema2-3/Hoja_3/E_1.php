<?php
$a = 5;
$b = 10;
$c = 15;

$resultado = $a;
if ($b > $a) $resultado = $b;
if ($c > $a) $resultado = $c;

echo $resultado;