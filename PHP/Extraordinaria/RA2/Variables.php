<?php
$var1 = "Hola Mundo";  // Cadena de texto
$var2 = 25;            // Número entero
$var3 = 3.14;          // Número flotante
$var4 = true;          // Booleano

// 1. gettype() - Devuelve el tipo de una variable
echo "gettype(var1): " . gettype($var1) . "\n";
// gettype(var1): string

echo "gettype(var2): " . gettype($var2) . "\n";
// gettype(var2): integer

echo "gettype(var3): " . gettype($var3) . "\n";
// gettype(var3): double

echo "gettype(var4): " . gettype($var4) . "\n";
// gettype(var4): boolean

// 2. unset() - Elimina una variable
unset($var2);
echo "Después de unset(var2), var2 está definida?: " . (isset($var2) ? "Sí" : "No") . "\n";
// Después de unset(var2), var2 está definida?: No

// 3. var_dump() - Muestra información detallada sobre una variable
echo "var_dump(var1): ";
var_dump($var1);
// var_dump(var1): string(10) "Hola Mundo"

echo "var_dump(var3): ";
var_dump($var3);
// var_dump(var3): float(3.14)

// 4. checkdate() - Verifica si una fecha es válida (requiere 3 parámetros: mes, día y año)
$month = 2;  // Febrero
$day = 30;   // Día 30 (No válido)
$year = 2025;
echo "checkdate(2, 30, 2025): " . (checkdate($month, $day, $year) ? "Sí" : "No") . "\n";
// checkdate(2, 30, 2025): No
?>
