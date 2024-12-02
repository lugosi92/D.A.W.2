<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por POST
    $num1 = isset($_POST['num1']) ? (float) $_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (float) $_POST['num2'] : 0;

    // Calcular la suma
    $suma = $num1 + $num2;

    // Devolver el resultado
    echo $suma;
} else {
    echo "Solicitud inválida.";
}
?>
