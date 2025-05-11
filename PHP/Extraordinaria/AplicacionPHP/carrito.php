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
echo "<tr><th>Nombre</th><th>Unidades</th><th>Precio unidad</th><th>Subtotal</th></tr>";

$total = 0;

// Variable $_SESSION:
// array(3) { 
//     ["correo"]=> string(17) "ejemplo@gmail.com"
//     ["codRestaurante"]=> int(1) 
//     ["carrito"]=> 
//         array(3) { 
//             [19]=> int(5) 
//             [21]=> int(6) 
//             [23]=> int(15) 
//     } 
// }


foreach ($_SESSION['carrito'] as $codProducto => $unidades) {
    $producto = cargar_producto($codProducto); // Devuelve array asociativo con nombre y precio
    $precio = $producto['precio'];
    
    $subtotal = $precio * $unidades;
    $total += $subtotal;

    
    echo "<tr>";
    echo "<td>{$producto['nombre']}</td>";
    echo "<td>$unidades</td>";
    echo "<td>" . number_format($precio, 2) . " €</td>";
    echo "<td>" . number_format($subtotal, 2) . " €</td>";
    echo "</tr>";
}

echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>" . number_format($total, 2) . " €</strong></td></tr>";
echo "</table>";

// Botón para redirigir a confirmar_pedido.php
echo "<form action='confirmar_pedido.php' method='post'>";
echo "<button type='submit'>Confirmar Pedido</button>";
echo "</form>";

// Botón para volver a categorías
echo "<form action='categorias.php' method='get'>";
echo "<button type='submit'>Seguir comprando</button>";
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
