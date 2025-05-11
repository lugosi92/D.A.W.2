<?php
function cargar_producto($cod) {
    
    require 'conexion.php';
    $sql = "SELECT nombre, precio FROM productos WHERE codProducto = ?";
    $stmt = $bd ->prepare($sql);
    $stmt->execute([$cod]);
    return $stmt->fetch();
}

function cargar_productos($codigos) {
    require 'conexion.php';
    global $bd;

    if (count($codigos) === 0) return [];

    $placeholders = implode(',', array_fill(0, count($codigos), '?'));
    $sql = "SELECT * FROM productos WHERE codProducto IN ($placeholders)";
    $stmt = $bd->prepare($sql);
    $stmt->execute($codigos);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
