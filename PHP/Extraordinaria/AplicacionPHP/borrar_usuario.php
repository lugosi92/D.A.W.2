<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";

// Solo permitir si es admin
if (!$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $bd->prepare("DELETE FROM restaurante WHERE codRestaurante = ?");
    $stmt->execute([$id]);
}

header("Location: admin_restaurantes.php");
exit;
