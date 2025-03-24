<?php
$var1 = "Hola Mundo";
$var2 = null;
$array = [1, 2, 3, 4, 5];

// 1. isset() - Verifica si una variable está definida y no es null
echo "isset (var1): " . (isset($var1) ? "true" : "false") . "\n";
// isset (var1): true

echo "isset (var2): " . (isset($var2) ? "true" : "false") . "\n";
// isset (var2): false

// 2. empty() - Verifica si una variable está vacía (0, false, null, '', etc.)
echo "empty (var1): " . (empty($var1) ? "true" : "false") . "\n";
// empty (var1): false

$var3 = "";
echo "empty (var3): " . (empty($var3) ? "true" : "false") . "\n";
// empty (var3): true

// 3. in_array() - Verifica si un valor existe en un array
echo "in_array (3): " . (in_array(3, $array) ? "true" : "false") . "\n";
// in_array (3): true

echo "in_array (6): " . (in_array(6, $array) ? "true" : "false") . "\n";
// in_array (6): false

// 4. checkdate() - Verifica si una fecha es válida (mes, día, año)
$month = 2;
$day = 29;
$year = 2025;
echo "checkdate (febrero 29, 2025): " . (checkdate($month, $day, $year) ? "true" : "false") . "\n";
// checkdate (febrero 29, 2025): false (2025 no es un año bisiesto)

$month = 2;
$day = 28;
$year = 2024;
echo "checkdate (febrero 28, 2024): " . (checkdate($month, $day, $year) ? "true" : "false") . "\n";
// checkdate (febrero 28, 2024): true (2024 es un año bisiesto)
?>
