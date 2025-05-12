<?php
require_once "conexion.php";
require_once "cabeceraAdmin.php";

// Verificamos si el usuario es administrador
if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php"); // Redirigir si no es admin
    exit;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Bienvenido al Panel de Administración</h1>
    
    <ul>
        <li><a href="admin_productos.php">Administrar Productos</a></li>
        <li><a href="admin_categorias.php">Administrar Categorías</a></li>
        <li><a href="admin_restaurantes.php">Administrar Restaurantes</a></li>
    </ul>

</body>
</html>
