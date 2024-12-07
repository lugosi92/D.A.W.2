<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();

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
			$sql = "insert into pedidosproductos(Pedido, Producto, Unidades)
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
?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Pedidos</title>		
	</head>
	<body>
	<?php 
	require 'cabecera.php';			
	$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario']['codRes']);
	if($resul === FALSE){
		echo "No se ha podido realizar el pedido<br>";			
	}else{
		$correo = $_SESSION['usuario']['correo'];
		echo "Pedido realizado con éxito. Se enviará un correo de confirmación a: $correo ";													
		//vaciar carrito	
		$_SESSION['carrito'] = [];

		}		
	?>		
	</body>
</html>
	