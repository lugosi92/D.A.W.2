<?php
// Session start es necesario porque no esta includio la cabecera
session_start();
require_once "funciones/comprobar_sesion.php";
comprobar_sesion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoge el codigo del producto + su cantidad , es decir,  3 => 1  Producto con cod 3, 1 unidad
    $codProducto = $_POST['cod'];
    $unidades = (int)$_POST['unidades'];

   // Validamos que la cantidad sea un número válido
   if ($unidades <= 0) {
    echo "<p class='error'>La cantidad debe ser mayor que cero.</p>";
    exit;
    }

    // Si el producto ya está en el carrito, se sumarán las unidades 
    if (isset($_SESSION['carrito'][$codProducto])) {
        $_SESSION['carrito'][$codProducto] += $unidades;
    } else {
        // Se añade el producto al carrito con el código
        $_SESSION['carrito'][$codProducto] = $unidades;
    }
    
}

header("Location: carrito.php");

?>