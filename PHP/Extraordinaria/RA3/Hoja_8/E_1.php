<?php
//1. Obtener fecha
//2. Ajustar a cada formato

$fechaActual = new DateTime();

echo $fechaActual->format('l') . "<br>";
echo $fechaActual->format('l dS \o\f M Y h:i:s A') . "<br>"; //Sunday 03rd of May 2024 08:22:51 PM
echo $fechaActual->format('l, d \d\e M \d\e Y h:i:s A') . "<br>"; //Sunday, 03 de May de 2024 08:22:51 PM
echo $fechaActual->format('M d, Y, h:ia') . "<br>";//May 3, 2024, 8:22 pm
echo $fechaActual->format('d.m.y') . "<br>";//05.03.24
echo $fechaActual->format('d,m,Y') . "<br>";//3, 5, 2024
echo $fechaActual->format('Ymd') . "<br>"; //20240503
echo $fechaActual->format('\i\t \i\s \t\h\e dS \d\a\y') . "<br>"; //it is the 3rd day.
echo $fechaActual->format('D M d h:i:s T Y') . "<br>"; //Sun May 3 20:22:51 CEST 2024
echo $fechaActual->format('h:m:sa') . "<br>"; //20:05:51 pm
echo $fechaActual->format('h:m:s') . "<br>"; //20:22:51


echo $fechaActual->format('l  \of F') . "<br>"; // Nombre completo del día y mes completo
echo $fechaActual->format('D \o\f M') . "<br>"; // Nombre abreviado del día y mes