<?php
/*$ciudades[5]=’Madrid’;
$ciudades[7]=’Oviedo’;
$ciudades[]=’Cáceres’;
$ciudades[]=’ALICANTE’;
$ciudades[]=’Almería’;
$ciudades[]=’Zaragoza’;*/

$ciudades = array(
    5 => 'Madrid',
    7 => 'Oviedo',
    'Cáceres',
    'ALICANTE',
    'Almería',
    'Zaragoza'
);

//A-------- MAYOR A MENOR (sin asociacion)
echo "<br>";


$array_clonado = $ciudades;
rsort($array_clonado);
print_r($array_clonado);

echo "<br>";

//B-------- MAYOR A MENOR (con asociacion)
echo "<br>";

$array_clonadoB = $ciudades;

arsort($array_clonadoB);
print_r($array_clonadoB);

echo "<br>";

//C-------- MENOR A MAYOR por claves
echo "<br>";


$array_clonadoC = $ciudades;

ksort($array_clonadoC);
print_r($array_clonadoC);

echo "<br>";

//D-------- Mezcla el array aleatoriamente
echo "<br>";

$array_clonadoD = $ciudades;

shuffle($array_clonadoD);
print_r($array_clonadoD);

echo "<br>";

//E--------- Claves de 2 valores seleccionados aleatoriamente

$array_clonadoE = $ciudades;

$valores_aleatorios = array_rand($array_clonadoE, 2);
print_r($valores_aleatorios);

echo "<br>";


//F--------- Mayor a menor sin diferenciar entre mayusculas y minusculas
echo "<br>";

/*
1. evitando mayusculas y minusculas(por defecto es de menor a mayor)
2. Se invierte y solucioando con reverse
*/


$array_clonadoF = $ciudades;

natcasesort($array_clonadoF); // Ordena sin diferenciar entre mayúsculas/minúsculas de menor a mayor 
$array_clonadoF = array_reverse($array_clonadoF); //invierte de mayor a menor

print_r($array_clonadoF);

echo "<br>";



?>