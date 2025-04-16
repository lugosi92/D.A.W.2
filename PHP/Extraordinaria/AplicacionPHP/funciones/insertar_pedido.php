<?php
function insertar_pedido($carrito, $codRes) {
    require_once "leer_config.php"; // Asegúrate de incluir la función leer_config

    $res = leer_config(__DIR__ . "/configuracion.xml", __DIR__ . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $bd->beginTransaction();

    $hora = date("Y-m-d H:i:s");

    // Insertar el pedido
    $sql = "INSERT INTO pedidos (fecha, enviado, codRestaurante) VALUES (?, 0, ?)";
    $stmt = $bd->prepare($sql);
    if (!$stmt->execute([$hora, $codRes])) {
        return false;
    }

    // Obtener el ID del pedido insertado
    $pedido = $bd->lastInsertId();

    // Insertar los productos del pedido
    foreach ($carrito as $codProd => $unidades) {
        $sql = "INSERT INTO pedidosproductos (codPedido, codProducto, unidades) VALUES (?, ?, ?)";
        $stmt = $bd->prepare($sql);
        if (!$stmt->execute([$pedido, $codProd, $unidades])) {
            $bd->rollBack();
            return false;
        }

        // Actualizar el stock
        $sql = "UPDATE productos SET stock = stock - ? WHERE codProducto = ?";
        $stmt = $bd->prepare($sql);
        if (!$stmt->execute([$unidades, $codProd])) {
            $bd->rollBack();
            return false;
        }
    }

    $bd->commit();
    return $pedido; // Devolver el ID del pedido en vez de true
}
