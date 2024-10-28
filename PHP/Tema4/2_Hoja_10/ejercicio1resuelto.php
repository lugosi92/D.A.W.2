<?php

session_start();

$buscar = $_SESSION['buscador'];
$filtro = $_SESSION['tipo'];
$op = $_SESSION['op'];


echo "<p><strong> Texto busqueda </strong> $buscar </p>";
echo "<p><strong> Buscar en:</strong> $filtro </p>";
echo "<p><strong> Genero:</strong> $op </p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <a href ="ejercicio_1.php">Volver</a>
</body>
</html>