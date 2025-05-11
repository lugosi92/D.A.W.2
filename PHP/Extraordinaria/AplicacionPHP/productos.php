<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>

<?php
require 'cabecera.php';
require_once "funciones/comprobar_sesion.php";
require_once 'funciones/cargar_categorias.php';
require_once 'funciones/cargar_productos_categoria.php';

comprobar_sesion();


$categoria = cargar_categoria($_GET['categoria']);
$productos = cargar_productos_categoria($_GET['categoria']);

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];


if (!$categoria || !$productos) {
    echo "<p class='error'>Error al conectar con la base de datos</p>";
    exit;
}

echo "<h1>" . $categoria['nombre'] . "</h1>";
echo "<p>" . $categoria['descripcion'] . "</p>";

echo "<table>";
echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>"; 


foreach ($productos as $producto) {
    $cod = $producto['codProducto'];
    $nom = $producto['nombre'];
    $des = $producto['descripcion'];
    $peso = $producto['peso'];
    $stock = $producto['stock'];
    $precio = number_format($producto['precio'], 2);

    // Restar lo que hay en el carrito
    $en_carrito = isset($carrito[$cod]) ? $carrito[$cod] : 0;
    $stock_mostrado = $stock - $en_carrito;

    echo "<tr>
        <td>$nom</td>
        <td>$des</td>
        <td>$peso</td>
        <td>$stock_mostrado</td>
        <td>$precio €</td>
        <td>
            <form action='añadir.php' method='POST'>
                <input name='unidades' type='number' min='1' max='$stock_mostrado' value='0' required>
                <input type='hidden' name='cod' value='$cod'>
                <input type='submit' value='Comprar'>
            </form>
        </td>
    </tr>";
}

echo "</table>";


?>

</body>
</html>