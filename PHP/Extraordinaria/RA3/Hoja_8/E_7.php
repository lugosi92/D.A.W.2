<?php
// Fechas de inicio y fin de la oferta
$fechaInicio = new DateTime('2024-10-01');
$fechaFin = new DateTime('2024-11-01');

// Fecha actual
$fechaActual = new DateTime();

echo "Fecha actual: ";
echo $fechaActual -> format('d/m/Y') . "<br>";

// Calcular el tiempo restante
$intervalo = $fechaActual->diff($fechaFin);
$diasRestantes = $intervalo->days;

// Comprobar si la oferta ya ha terminado
if ($fechaActual > $fechaFin) {
    echo $mensaje = "La oferta ha terminado.";
} else {
    echo $mensaje = "Esta oferta es válida durante 1 mes, comenzó el " . $fechaInicio->format('d/m/Y') .
               ", finaliza dentro de $diasRestantes días, el " . $fechaFin->format('d/m/Y') . ".";
}
?>