<!-- 
    // Ejercicio 1:
    // Dado el array:
-->

<?php

$array = array(
    'k3' => 'JUAN',
    'k5' => 'Álvaro',
    'k0' => 'Maite',
    'k2' => 'ÁLVARO',
    'k1' => 'Juan',
    'k4' => 'Martina'
);

echo "<h1>Ejercicio 1: </h1> <br/>";
echo "a) Ordenarlo por los valores de mayor a menor sin mantener las asociaciones clave-valor: <br>";
sort($array, SORT_REGULAR);
foreach ($array as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> b) Igual pero manteniendo las asociaciones <br>";
asort($array, SORT_REGULAR);
foreach ($array as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> c) Ordenarlo por las claves de menor a mayor <br>";
ksort($array, SORT_REGULAR);
foreach ($array as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> d) Mezcla el array aleatoriamente <br>";
shuffle($array);
foreach ($array as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> e) Obtén un array con las claves de dos valores seleccionados aleatoriamente.<br>";
$claves_aleatorias = array_rand($array, 2);
foreach ($claves_aleatorias as $key) {
    echo $key . "<br>";
}

echo "<br> f) Ordénalo por los valores de mayor a menor sin diferenciar mayúsculas y minúsculas.<br>";
sort($array, SORT_NATURAL);
foreach ($array as $key => $item) {
    echo "$key => $item <br>";
}

?>

<!-- 
    Ejercicio 2:
    Realiza el mismo ejercicio anterior para el array:
-->
<?php
echo "<h1>Ejercicio 2: </h1> <br/>";

?>

<!-- 
    Ejercicio 3:
    Ordena $array1:
-->


<?php
$array1 = array(
    "imagen12.png",
    "imagen10.png",
    "imagen2.png",
    "img1.png"
);

echo "<h1>Ejercicio 3: </h1> <br/>";
echo "<br> a) utilizando un algoritmo de orden natural <br>";

sort($array1, SORT_NATURAL);
foreach ($array1 as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> b) utilizando un algoritmo de ordenación normal ascendente manteniendo la asociación clave-valor <br>";
asort($array1, SORT_REGULAR);
foreach ($array1 as $key => $item) {
    echo "$key => $item <br>";
}
?>

<!-- 
    Ejercicio 4:
    Ordena los siguientes arrays mediante un orden natural:
-->
<?php
$negativos = array('-5', '3', '-2', '0', '-1000', '9', '1');
echo "<br> a) <br>";
sort($negativos, SORT_NUMERIC);
foreach ($negativos as $key => $item) {
    echo "$key => $item <br>";
}
$ceros = array('09', '8', '10', '009', '011', '0');
echo "<br> b) <br>";
sort($ceros, SORT_NUMERIC);
foreach ($ceros as $key => $item) {
    echo "$key => $item <br>";
}
?>


<!-- 
    Ejercicio 5:
    Ordena el siguiente array mediante orden natural:
-->

<?php
$array1 = array(
    'IMG0.png',
    'img12.png',
    'img10.png',
    'img2.png',
    'img1.png',
    'IMG3.png'
);

echo "<h1>Ejercicio 5: </h1> <br/>";
echo "<br> a) sensible a mayúsculas y minúsculas <br>";
sort($array1, SORT_LOCALE_STRING);
foreach ($array1 as $key => $item) {
    echo "$key => $item <br>";
}
echo "<br> b) insensible a mayúsculas y minúsculas <br>";
sort($array1, SORT_FLAG_CASE | SORT_STRING);
foreach ($array1 as $key => $item) {
    echo "$key => $item <br>";
}


?>