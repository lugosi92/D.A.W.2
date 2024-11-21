<?php
function insertar_pedido($carrito, $codRes) {
    $res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $bd->beginTransaction();
    $hora = date("Y-m-d H:i:s", time());
    // insertar el pedido
    $sql = "insert into pedidos(fecha, enviado, restaurante)
            values('$hora', 0, $codRes)";
    $result = $bd->query($sql);
    if (!$result) {
        return FALSE;
    }
    // coger el id del nuevo pedido para las filas detalle
    $pedido = $bd->lastInsertId();
    // insertar las filas en pedidoproductos
    foreach($carrito as $codProd => $unidades) {
        $sql = "insert into pedidoproductos(Pedido, Producto, Unidades)
                values($pedido, $codProd, $unidades)";
        //echo $sql;
        $result = $bd->query($sql);
        if (!$result) {
            $bd->rollback();
            return FALSE;
        }
        $sql = "update productos set stock = stock - $unidades
                where codProd = $codProd";
        $result = $bd->query($sql);
        if (!$result) {
            $bd->rollback();
            return FALSE;
        }
    }
    $bd->commit();
    return $pedido;
}

