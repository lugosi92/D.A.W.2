<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require_once 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();

	// recibe un array de códigos de productos
	// devuelve un cursor con los datos de esos productos
	function cargar_productos($codigosProductos){
		$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
		$bd = new PDO($res[0], $res[1], $res[2]);
		$texto_in = implode(",", $codigosProductos);
		$ins = "select * from productos where CodProd in ($texto_in)";
		$resul = $bd->query($ins);	
		if (!$resul) {
			return FALSE;
		}else{
			//Almacena los productos en un array
			$productos = array();
			while ($producto=$resul->fetch(PDO::FETCH_ASSOC)){
				$productos[]=$producto;
			}
		return $productos;	
		}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Carrito de la compra</title>		
	</head>
	<body>
		
		<?php 
		require 'cabecera.php';			
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		if($productos === FALSE){
			echo "<p>No hay productos en el carrito</p>";
			exit;
		}
		echo "<h2>Carrito de la compra</h2>";
		echo "<table>"; //abrir la tabla
		echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th><th>Eliminar</th></tr>";
		foreach($productos as $producto){
			$cod = $producto['CodProd'];
			$nom = $producto['Nombre'];
			$des = $producto['Descripcion'];
			$peso = $producto['Peso'];
			$unidades = $_SESSION['carrito'][$cod];								
			
			//print_r($producto);				
			echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>
			<td><form action = 'eliminar.php' method = 'POST'>
			<input name = 'unidades' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Eliminar'>
			<input name = 'cod' type='hidden' value = '$cod'>  </form></td></tr>";	
		}
		echo "</table>";						
		?>
		<hr>
		<a href = "procesar_pedido.php">Realizar pedido</a>		
	</body>
</html>