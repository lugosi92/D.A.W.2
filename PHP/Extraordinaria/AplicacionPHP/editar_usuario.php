<?php
session_start();
require_once 'conexion.php';

if (!$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit;
}


$id = $_GET['id'];
$stmt = $bd->prepare("SELECT * FROM restaurante WHERE codRestaurante = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $es_admin = isset($_POST['es_admin']) ? 1 : 0;

    $stmt = $bd->prepare("UPDATE restaurante SET correo = ?, es_admin = ? WHERE codRestaurante = ?");
    $stmt->execute([$correo, $es_admin, $id]);

    header("Location: admin_restaurantes.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST">
        <label>Correo: <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>"></label><br>
        <label>Es administrador: <input type="checkbox" name="es_admin" <?= $usuario['es_admin'] ? 'checked' : '' ?>></label><br>
        <button type="submit">Guardar cambios</button>
    </form>
    <p><a href="admin_restaurantes.php">Volver</a></p>
</body>
</html>
