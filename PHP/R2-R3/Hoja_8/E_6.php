<?php
// Crear un objeto DateTime con la fecha y hora específicas
$fecha = new DateTime('1978-01-12 13:45:00');

// Obtener el día de la semana en español
$diaSemana = strftime('%A', $fecha->getTimestamp());

// Mostrar el resultado
echo "El 12 de enero de 1978 fue un $diaSemana.";
?>
