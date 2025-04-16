<?php
require_once 'cargar_productos.php'; 

function enviar_correo($carrito, $pedido, $correo) {
    $texto = "<h1>Pedido nº $pedido</h1>";
    $texto .= "<h2>Restaurante: $correo</h2>";
    $texto .= "<p>Detalle del pedido:</p>";

    $productos = cargar_productos(array_keys($carrito));

    $texto .= "<table border='1' cellpadding='5' cellspacing='0'>";
    $texto .= "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th></tr>";

    foreach ($productos as $producto) {
        $cod = $producto['codProducto'];
        $nom = $producto['nombre'];
        $des = $producto['descripcion'];
        $peso = $producto['peso'];
        $unidades = $carrito[$cod];

        $texto .= "<tr>";
        $texto .= "<td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>";
        $texto .= "</tr>";
    }

    $texto .= "</table>";
    return $texto;
}
