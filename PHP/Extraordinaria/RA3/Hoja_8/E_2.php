<?php

$fechaActual = new DateTime();

//Fecha Actual
echo $fechaActual-> format('Y-m-d') . "<br>";

//Fecha dentro de 1 semana
$fechaActual2 = $fechaActual;
$fechaActual2 -> modify('+1 week');
echo $fechaActual2->format('Y-m-d') . "<br>";
echo $fechaActual2->format('l, d \d\e F \d\e Y. \A \l\a\s h:s');