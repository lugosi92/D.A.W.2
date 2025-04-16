<?php
require_once "conexion.php";
require 'cabecera.php';

require_once "funciones/comprobar_sesion.php";
require_once 'funciones/cargar_productos.php'; 

comprobar_sesion();

echo "<h1>Carrito de la compra</h1>";

if (empty($_SESSION['carrito'])) {
    echo "<p>No hay productos en el carrito.</p>";
    exit;
}

echo "<table>";
echo "<tr><th>Nombre</th><th>Unidades</th></tr>";

foreach ($_SESSION['carrito'] as $codProducto => $unidades) {
    $producto = cargar_producto($codProducto); // Devuelve array asociativo con nombre, etc.
    echo "<tr>";
    echo "<td>{$producto['nombre']}</td>";
    echo "<td>$unidades</td>";
    echo "</tr>";
}
echo "</table>";

// Botón para redirigir a confirmar_pedido.php
echo "<form action='confirmar_pedido.php' method='post'>";
echo "<button type='submit'>Confirmar Pedido</button>";
echo "</form>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- IMPORTAR CSS -->
 <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/carrito.css">   
</head>

</html>
