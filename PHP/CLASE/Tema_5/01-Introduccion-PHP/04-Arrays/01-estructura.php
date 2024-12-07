<?php
// Estructura clave valor
echo "Estructura array: <br>";
$arr1 = [
    0=> 444,
    1 => 222,
    2 => 332,
];

print_r($arr1);
echo "<br> Recorrer array con foreach: <br>";
// foreach
foreach($arr1 as $nombre) {
    echo "$nombre <br>";
}
?>

