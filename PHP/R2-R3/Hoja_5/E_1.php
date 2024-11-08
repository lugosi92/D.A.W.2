<?php
$array = array(
    'k3' => 'JUAN',
    'k5' => 'Álvaro',
    'k0' => 'Maite',
    'k2' => 'ÁLVARO',
    'k1' => 'Juan',
    'k4' => 'Martina'
);

foreach($array as $Clave => $Valor){
        echo "Clave: " . $Clave . "<br>";
        echo "Valor: " . $Valor . "<br><br>";  
}

//A-------- MAYOR A MENOR (sin asociacion)
echo "<br>";

$array_clonado = $array;
rsort($array_clonado);
print_r($array_clonado);

echo "<br>";
//B-------- MAYOR A MENOR (con asociacion)
echo "<br>";

$array_clonadoB = $array;
arsort($array_clonadoB);
print_r($array_clonadoB);

echo "<br>";
//C-------- MENOR A MAYOR por claves
echo "<br>";
$array_clonadoC = $array;
ksort($array_clonadoC);
print_r($array_clonadoC);

echo "<br>";

//D-------- Mezcla el array aleatoriamente
echo "<br>";

$array_clonadoD = $array;
shuffle($array_clonadoD);
print_r($array_clonadoD);

echo "<br>";


//E--------- Claves de 2 valores seleccionados aleatoriamente
echo "<br>";
$array_clonadoE = $array;
$valores_aleatorios = array_rand($array_clonadoE, 2);
print_r($valores_aleatorios);

echo "<br>";

//F--------- Mayor amenor sin diferenciar entre mayusculas y minusculas

/*
    1. Clonar el array
    2. ordenar de menor a mayor son diferenciar entre mayusculas y minusculas (natcasesor)
    3. invertir el array (array_reverse)
*/

echo "<br>";

$array_clonadoF = $array;

natcasesort($array_clonadoF);
$array_clonadoF = array_reverse($array_clonadoF);

print_r($array_clonadoF);
