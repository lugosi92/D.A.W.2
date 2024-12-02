<?php

// SORT_REGULAR - compara elementos normalmente (no cambia los tipos)
// SORT_NUMERIC - compara elementos de forma numérica
// SORT_STRING - compara elementos como cadenas
// SORT_LOCALE_STRING - compara elementos como cadenas, basándose en la configuración regional en uso. Utiliza la configuración regional, la cual puede cambiarse usando setlocale().
// SORT_NATURAL - compara elementos como cadenas usando el "orden natural" de la misma forma que natsort().
// SORT_FLAG_CASE - se puede combinar (OR a nivel de bits) con SORT_STRING o SORT_NATURAL para ordenar cadenas de forma insensible a mayúsculas/minúsculas.

$frutas = array(
    "Naranja1",
    "naranja2",
    "Naranja3",
    "naranja20"
);
sort($frutas, SORT_NUMERIC);
foreach ($frutas as $clave => $valor) {
    echo "frutas[" . $clave . "] = " . $valor . "<br>";
}

// asort ->
// ksort -> ordena por claves
// rsort -> ordenar de menor a mayor
// shuffle -> ordena de manera aleatoria
?>
