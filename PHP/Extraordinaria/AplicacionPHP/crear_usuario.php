<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";

// Solo permitir si es admin
if (!$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $clave = $_POST['clave']; 
    $es_admin = isset($_POST['es_admin']) ? 1 : 0;

    $stmt = $bd->prepare("INSERT INTO restaurante (correo, clave, es_admin) VALUES (?, ?, ?)");
    $stmt->execute([$correo, $clave, $es_admin]);

    header("Location: admin_restaurantes.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <form method="POST">
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="clave" required></label><br>
        <label>Es administrador: <input type="checkbox" name="es_admin"></label><br>
        <button type="submit">Crear Usuario</button>
    </form>
    <p><a href="admin_restaurantes.php">Volver</a></p>
</body>
</html>
