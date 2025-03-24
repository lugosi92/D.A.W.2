<?php

$cad = "defjvb/n";
$cad1 = " fp.informatica.iessanjuandelacruz@educa.madrid.org ";
$cad2 = "educa.madrid.org";
$cad3 = "defghijk/n";
$cad4 = "defghi";
$cad5 = 'path=["\usr\$usuario"]|\usr';
$cad6 = "C/ Claveles 23,20D,28033,Madrid";
$cad7 = " juan rodríguez Hernández";
$long = 15;
$car1 = '.';
$car2 = '*';

// 1) addslashes($cad5)
$result1 = addslashes($cad5);
// Salida: path=[\"\\usr\$usuario\"]|\usr

// 2) quotemeta($cad3)
$result2 = quotemeta($cad3);
// Salida: defghijk\/n

// 3) trim($cad1)
$result3 = trim($cad1);
// Salida: "fp.informatica.iessanjuandelacruz@educa.madrid.org"

// 4) chop($cad3)
$result4 = chop($cad3);
// Salida: defghijk

// 5) chr(45)
$result5 = chr(45);
// Salida: "-"

// 6) strlen($cad6);
$result6 = strlen($cad6);
// Salida: 39

// 7) strchr($cad1, $car1)
$result7 = strchr($cad1, $car1);
// Salida: ".informatica.iessanjuandelacruz@educa.madrid.org "

// 8) str_pad($cad4, $long, $car1, STR_PAD_RIGHT)
$result8 = str_pad($cad4, $long, $car1, STR_PAD_RIGHT);
// Salida: "defghi....."

// 9) str_pad($cad3, -2, $car2, STR_PAD_BOTH)
$result9 = str_pad($cad3, -2, $car2, STR_PAD_BOTH);
// Salida: "defghijk/n" (se recomienda usar una longitud positiva)

// 10) strrchr($cad6, ',')
$result10 = strrchr($cad6, ',');
// Salida: ",20D,28033,Madrid"

// 11) ucwords($cad7)
$result11 = ucwords($cad7);
// Salida: "Juan Rodríguez Hernández"

// 12) substr($cad1, -9)
$result12 = substr($cad1, -9);
// Salida: "dacruz@educa.madrid.org"

// 13) strstr($cad6, 'claveles')
$result13 = strstr($cad6, 'claveles');
// Salida: "Claveles 23,20D,28033,Madrid"

// 14) stristr($cad6, 'claveles')
$result14 = stristr($cad6, 'claveles');
// Salida: "Claveles 23,20D,28033,Madrid" (no distingue entre mayúsculas y minúsculas)

// 15) str_repeat($cad4, 6)
$result15 = str_repeat($cad4, 6);
// Salida: "defghidefghidefghidefghidefghidefghi"

// 16) count_chars($cad2, 3)
$result16 = count_chars($cad2, 3);
// Salida: Array ( "e" => 1, "a" => 1, "m" => 1, "d" => 1, "o" => 1, "r" => 1, "g" => 1, "." => 1, "c" => 1, "u" => 1 )

// 17) strpos($cad1, ".i", 2)
$result17 = strpos($cad1, ".i", 2);
// Salida: 4 (posición del primer ".i" después del segundo carácter)

// 18) strrpos($cad1, 'i')
$result18 = strrpos($cad1, 'i');
// Salida: 12 (posición de la última aparición de 'i')

// 19) strstr($cad1, '@')
$result19 = strstr($cad1, '@');
// Salida: "@educa.madrid.org"

// 20) strncmp($cad3, $cad, 4)
$result20 = strncmp($cad3, $cad, 4);
// Salida: 0 (son iguales en los primeros 4 caracteres)

// 21) quotemeta($cad5)
$result21 = quotemeta($cad5);
// Salida: path=\["\usr\$usuario"\]|\usr

// 22) strcmp(strstr($cad1, '@'), $cad2)
$result22 = strcmp(strstr($cad1, '@'), $cad2);
// Salida: 0 (son iguales)

// 23) strrev($cad3)
$result23 = strrev($cad3);
// Salida: "/nkjihgfed"

// 24) strtr("fp", "FP", $cad1)
$result24 = strtr("fp", "FP", $cad1);
// Salida: " FP.informatica.iessanjuandelacruz@educa.madrid.org "

// 25) strcmp($cad3, $cad4)
$result25 = strcmp($cad3, $cad4);
// Salida: 1 (cad3 es mayor que cad4)

// 26) strnatcmp($cad3, $cad4)
$result26 = strnatcmp($cad3, $cad4);
// Salida: 1 (cad3 es mayor que cad4 en orden natural)

// 27) substr($cad1, 15, -16)
$result27 = substr($cad1, 15, -16);
// Salida: "a"

// 28) strcspn($cad6, "20D")
$result28 = strcspn($cad6, "20D");
// Salida: 18 (número de caracteres antes de encontrar "20D")

// Imprimir resultados
print_r($result1);
echo "<br>";
print_r($result2);
echo "<br>";
print_r($result3);
echo "<br>";
print_r($result4);
echo "<br>";
print_r($result5);
echo "<br>";
print_r($result6);
echo "<br>";
print_r($result7);
echo "<br>";
print_r($result8);
echo "<br>";
print_r($result9);
echo "<br>";
print_r($result10);
echo "<br>";
print_r($result11);
echo "<br>";
print_r($result12);
echo "<br>";
print_r($result13);
echo "<br>";
print_r($result14);
echo "<br>";
print_r($result15);
echo "<br>";
print_r($result16);
echo "<br>";
print_r($result17);
echo "<br>";
print_r($result18);
echo "<br>";
print_r($result19);
echo "<br>";
print_r($result20);
echo "<br>";
print_r($result21);
echo "<br>";
print_r($result22);
echo "<br>";
print_r($result23);
echo "<br>";
print_r($result24);
echo "<br>";
print_r($result25);
echo "<br>";
print_r($result26);
echo "<br>";
print_r($result27);
echo "<br>";
print_r($result28);
?>