<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
    
	function cargar_categoria($codCat){
		$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
		$bd = new PDO($res[0], $res[1], $res[2]);
		$ins = "select nombre, descripcion from categorias where codcat = $codCat";
		$resul = $bd->query($ins);	
		if (!$resul) {
			return FALSE;
		}
		if ($resul->rowCount() === 0) {    
			return FALSE;
		}	
		//devuelve la fila de la categoría
		return $resul->fetch();	
	}
	
	function cargar_productos_categoria($codCat){
		$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
		$bd = new PDO($res[0], $res[1], $res[2]);	
		$sql = "select * from productos where categoria  = $codCat";	
		$resul = $bd->query($sql);	
		if (!$resul) {
			return FALSE;
		}
		if ($resul->rowCount() === 0) {    
			return FALSE;
		}	
		//si hay 1 o más
		return $resul;			
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Tabla de productos por categoría</title>		
	</head>
	<body>
		<?php 
		require 'cabecera.php';
		$cat = cargar_categoria($_GET['categoria']);
		$productos = cargar_productos_categoria($_GET['categoria']);		
		if($cat=== FALSE or $productos === FALSE){
			echo "<p class='error'>Error al conectar con la base datos</p>";
			exit;
		}
		echo "<h1>". $cat['nombre']. "</h1>";
		echo "<p>". $cat['descripcion']."</p>";		
		echo "<table>"; //abrir la tabla
		echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";
		foreach($productos as $producto){
			$cod = $producto['CodProd'];
			$nom = $producto['Nombre'];
			$des = $producto['Descripcion'];
			$peso = $producto['Peso'];
			$stock = $producto['Stock'];								
			echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td>
			<td><form action = 'anadir.php' method = 'POST'>
			<input name = 'unidades' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Comprar'><input name = 'cod' type='hidden' value = '$cod'>
			</form></td></tr>";
		}
		echo "</table>"			
		?>				
	</body>
</html>