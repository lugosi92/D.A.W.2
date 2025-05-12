<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";

// Solo permitir si es administrador
if (!$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit;
}

// Cargar usuarios
$stmt = $bd->query("SELECT * FROM restaurante");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Administrar Usuarios</h1>

    <a href="crear_usuario.php">Añadir Usuario</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Correo</th>
            <th>Es admin</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['codRestaurante'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['es_admin'] ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $usuario['codRestaurante'] ?>">Editar</a>
                    <a href="borrar_usuario.php?id=<?= $usuario['codRestaurante'] ?>">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="panel.php">Volver al panel</a></p>
</body>
</html>
