<?php
// 1. date() - Devuelve una fecha formateada
echo "date: " . date("Y-m-d H:i:s") . "\n";
// date: 2025-03-23 14:35:21 (La salida variará según la fecha y hora actual)

// 2. getdate() - Devuelve un array con información sobre la fecha
$date_info = getdate();
echo "getdate: ";
print_r($date_info);
// getdate: Array (
//     [seconds] => 21
//     [minutes] => 35
//     [hours] => 14
//     [mday] => 23
//     [mon] => 3
//     [year] => 2025
//     [wday] => 0
//     [yday] => 81
//     [weekday] => Sunday
//     [month] => March
//     [0] => 1679579721
// )

// 3. checkdate() - Comprueba si una fecha es válida (mes, día, año)
$month = 2;
$day = 29;
$year = 2025;
echo "checkdate: " . (checkdate($month, $day, $year) ? "Fecha válida" : "Fecha no válida") . "\n";
// checkdate: Fecha no válida (2025 no es un año bisiesto)

// Otro ejemplo con una fecha válida
$month = 2;
$day = 28;
$year = 2024;
echo "checkdate: " . (checkdate($month, $day, $year) ? "Fecha válida" : "Fecha no válida") . "\n";
// checkdate: Fecha válida (2024 es un año bisiesto)
?>
