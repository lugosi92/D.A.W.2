<?php
// Obtener el día de la semana en inglés
$dia = date('l');

// Definir el color de fondo según el día de la semana
switch ($dia) {
    case 'Monday':
        $color = '#FFDDC1'; // Color para el lunes
        break;
    case 'Tuesday':
        $color = '#FFD1DC'; // Color para el martes
        break;
    case 'Wednesday':
        $color = '#D4A5A5'; // Color para el miércoles
        break;
    case 'Thursday':
        $color = '#A5D6D4'; // Color para el jueves
        break;
    case 'Friday':
        $color = '#A5A7FF'; // Color para el viernes
        break;
    case 'Saturday':
        $color = '#D1FFD7'; // Color para el sábado
        break;
    case 'Sunday':
        $color = '#FFFACD'; // Color para el domingo
        break;
    default:
        $color = '#FFFFFF'; // Color predeterminado
        break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color de fondo según el día</title>
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>
    <h1>¡Hoy es <?php echo $dia; ?>!</h1>
</body>
</html>
