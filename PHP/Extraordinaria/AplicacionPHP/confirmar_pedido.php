<?php
require_once "conexion.php";
require 'cabecera.php';

require_once 'funciones/enviar_correo.php';
require_once 'funciones/insertar_pedido.php';
require_once "funciones/comprobar_sesion.php";

comprobar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
       <!-- Estilos globales -->
       <link rel="stylesheet" href="css/styles.css">
    <!-- Estilos específicos para confirmar el pedido -->
    <link rel="stylesheet" href="css/confirmar_pedido.css">
</head>
<body>
<?php
// Llamamos a insertar_pedido pasando el carrito y el cod del restaurante
$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['codRestaurante']);

if ($resul === FALSE) {
    echo "<p>No se ha podido realizar el pedido</p>";
} else {
    // ✅ Corregido aquí
    $correo = $_SESSION['correo'];
    echo "<p>Pedido realizado correctamente</p>";

    // Guardar copia del carrito antes de vaciarlo
    $compra = $_SESSION['carrito'];
    $_SESSION['carrito'] = []; // Vaciar carrito

    echo "<p>Se enviará un correo de confirmación a: $correo</p>";
    enviar_correo($compra, $resul, $correo);
}
?>
</body>
</html>
