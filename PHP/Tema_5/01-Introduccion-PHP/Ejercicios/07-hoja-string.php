<?php
// Variables
$cad = "defjvb<br>";
$cad1 = " fp.informatica.iessanjuandelacruz@educa.madrid.org ";
$cad2 = "educa.madrid.org";
$cad3 = "defghijk<br>";
$cad4 = "defghi";
$cad5 = 'path=["\\usr\\$usuario"]|\\usr';
$cad6 = "C/ Claveles 23,20D,28033,Madrid";
$cad7 = "juan rodríguez Hernández";
$long = 15;
$car1 = '.';
$car2 = '*';

// 1) addslashes($cad5)
// Escapa caracteres especiales como comillas simples, dobles y barras invertidas.
echo "1) addslashes(\$cad5): " . addslashes($cad5) . "<br>";

// 2) quotemeta($cad3)
// Añade barras invertidas antes de los caracteres con significado especial como . \ + * ? [ ^ ] ( $ )
echo "2) quotemeta(\$cad3): " . quotemeta($cad3) . "<br>";

// 3) trim($cad1)
// Elimina espacios en blanco (u otros caracteres) del principio y final de la cadena.
echo "3) trim(\$cad1): " . trim($cad1) . "<br>";

// 4) chop($cad3)
// Elimina espacios en blanco (o caracteres adicionales) del final de la cadena.
echo "4) chop(\$cad3): " . chop($cad3) . "<br>";

// 5) chr(45)
// Devuelve el carácter correspondiente al número ASCII 45, que es el guion (-).
echo "5) chr(45): " . chr(45) . "<br>";

// 6) strlen($cad6)
// Devuelve la longitud de la cadena, en este caso el número de caracteres en $cad6.
echo "6) strlen(\$cad6): " . strlen($cad6) . "<br>";

// 7) strchr($cad1, \$car1)
// Encuentra la primera aparición de '.' en $cad1 y devuelve la parte de la cadena desde esa posición en adelante.
echo "7) strchr(\$cad1, \$car1): " . strchr($cad1, $car1) . "<br>";

// 8) str_pad($cad4, $long, $car1, STR_PAD_RIGHT)
// Rellena $cad4 hasta una longitud de $long (15) con el carácter $car1 ('.') al final.
echo "8) str_pad(\$cad4, \$long, \$car1, STR_PAD_RIGHT): " . str_pad($cad4, $long, $car1, STR_PAD_RIGHT) . "<br>";

// 9) str_pad($cad3, -2, $car2, STR_PAD_BOTH)
// Como el tamaño es negativo, la función no actúa correctamente. Normalmente rellena a ambos lados de la cadena.
echo "9) str_pad(\$cad3, -2, \$car2, STR_PAD_BOTH): " . str_pad($cad3, -2, $car2, STR_PAD_BOTH) . "<br>";

// 10) strrchr($cad6, ',')
// Busca la última aparición de ',' en la cadena y devuelve el resto de la cadena desde ese punto.
echo "10) strrchr(\$cad6, ','): " . strrchr($cad6, ',') . "<br>";

// 11) ucwords($cad7)
// Convierte en mayúscula la primera letra de cada palabra en la cadena.
echo "11) ucwords(\$cad7): " . ucwords($cad7) . "<br>";

// 12) substr($cad1, -9)
// Devuelve los últimos 9 caracteres de la cadena $cad1.
echo "12) substr(\$cad1, -9): " . substr($cad1, -9) . "<br>";

// 13) strstr($cad6, 'claveles')
// Busca 'claveles' en $cad6 y devuelve el resto de la cadena desde la primera aparición.
echo "13) strstr(\$cad6, 'claveles'): " . strstr($cad6, 'claveles') . "<br>";

// 14) stristr($cad6, 'claveles')
// Igual que `strstr()`, pero no distingue entre mayúsculas y minúsculas.
echo "14) stristr(\$cad6, 'claveles'): " . stristr($cad6, 'claveles') . "<br>";

// 15) str_repeat($cad4, 6)
// Repite la cadena $cad4 (6 veces en este caso).
echo "15) str_repeat(\$cad4, 6): " . str_repeat($cad4, 6) . "<br>";

// 16) count_chars($cad2, 3)
// Devuelve una cadena con todos los caracteres únicos de $cad2, ordenados por frecuencia.
echo "16) count_chars(\$cad2, 3): " . count_chars($cad2, 3) . "<br>";

// 17) strpos($cad1, '.i', 2)
// Busca la posición de '.i' en $cad1, empezando desde la posición 2.
echo "17) strpos(\$cad1, '.i', 2): " . strpos($cad1, ".i", 2) . "<br>";

// 18) strrpos($cad1, 'i')
// Devuelve la última posición de 'i' en $cad1.
echo "18) strrpos(\$cad1, 'i'): " . strrpos($cad1, 'i') . "<br>";

// 19) strstr($cad1, '@')
// Devuelve la cadena desde la primera aparición de '@' en $cad1.
echo "19) strstr(\$cad1, '@'): " . strstr($cad1, '@') . "<br>";

// 20) strncmp($cad3, $cad, 4)
// Compara las primeras 4 letras de $cad3 y $cad, y devuelve 0 si son iguales.
echo "20) strncmp(\$cad3, \$cad, 4): " . strncmp($cad3, $cad, 4) . "<br>";

// 21) quotemeta($cad5)
// Igual que `quotemeta()`, pero aplicado a $cad5. Escapa caracteres especiales.
echo "21) quotemeta(\$cad5): " . quotemeta($cad5) . "<br>";

// 22) strcmp(strstr($cad1, '@'), $cad2)
// Compara el resultado de `strstr($cad1, '@')` con $cad2. Devuelve 0 si son iguales.
echo "22) strcmp(strstr(\$cad1, '@'), \$cad2): " . strcmp(strstr($cad1, '@'), $cad2) . "<br>";

// 23) strrev($cad3)
// Invierte la cadena $cad3.
echo "23) strrev(\$cad3): " . strrev($cad3) . "<br>";

// 24) strtr('fp', 'FP', $cad1)
// Reemplaza 'f' por 'F' y 'p' por 'P' en la cadena $cad1.
echo "24) strtr('fp', 'FP', \$cad1): " . strtr("fp", "FP", $cad1) . "<br>";

// 25) strcmp($cad3, $cad4)
// Compara $cad3 con $cad4. Devuelve 0 si son iguales.
echo "25) strcmp(\$cad3, \$cad4): " . strcmp($cad3, $cad4) . "<br>";

// 26) strnatcmp($cad3, $cad4)
// Compara $cad3 con $cad4 usando "natural order" (orden natural).
echo "26) strnatcmp(\$cad3, \$cad4): " . strnatcmp($cad3, $cad4) . "<br>";

// 27) substr($cad1, 15, -16)
// Devuelve una subcadena desde el índice 15 hasta el último 16 caracteres.
echo "27) substr(\$cad1, 15, -16): " . substr($cad1, 15, -16) . "<br>";

// 28) strcspn($cad6, '20D')
// Devuelve el número de caracteres iniciales en $cad6 que no contienen ninguno de los caracteres en '20D'.
echo "28) strcspn(\$cad6, '20D'): " . strcspn($cad6, '20D') . "<br>";

?>
