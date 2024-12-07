<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();

	function cargar_categorias(){
		$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
		$bd = new PDO($res[0], $res[1], $res[2]);
		$ins = "select codCat, nombre from categorias";
		$resul = $bd->query($ins);	
		if (!$resul) {
			return FALSE;
		}
		if ($resul->rowCount() === 0) {    
			return FALSE;
		}
		//devuelve la fila de la categoría 
		return $resul;	
	}
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

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Lista de categorías</title>
	</head>
	<body>
		<?php require 'cabecera.php';?>
		<h1>Lista de categorías</h1>		
		<!--lista de vínculos con la forma 
		productos.php?categoria=1-->
		<?php
		$categorias = cargar_categorias();
		if($categorias===false){
			echo "<p class='error'>Error al conectar con la base datos</p>";
		}else{
			echo "<ul>"; //abrir la lista
			foreach($categorias as $cat){				
				/*$cat['nombre] $cat['codCat']*/
				$url = "productos.php?categoria=".$cat['codCat'];
				echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
			}
			echo "</ul>";
		}
		?>
	</body>
</html>