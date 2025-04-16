<?php

require_once("leer_config.php"); 

function cargar_categorias(){
	// Obtiene el array de conexión llamando a leer_config()
	$res = leer_config(__DIR__ . "/configuracion.xml", __DIR__ . "/configuracion.xsd");

	// Conecta a la base de datos con PDO usando la cadena, usuario y clave
	$bd = new PDO($res[0], $res[1], $res[2]);

	// Ejecuta la consulta para seleccionar código y nombre de categoría
	$ins = "select codCategoria, nombre from categoria";
	$resultado = $bd->query($ins);	

	// Si no hay resultados o ocurre error, devuelve FALSE
	if (!$resultado || $resultado->rowCount() === 0) {
		return FALSE;
	}
	
	// Devuelve el objeto resultado con los datos de la consulta
	return $resultado;	
}



function cargar_categoria($codCat){
	// Obtiene el array de conexión llamando a leer_config()
	$res = leer_config(__DIR__ . "/configuracion.xml", __DIR__ . "/configuracion.xsd");

	$bd = new PDO($res[0], $res[1], $res[2]);

	$ins = "select nombre, descripcion from categoria where codCategoria = $codCat";
	$resultado = $bd->query($ins);

	if (!$resultado || $resultado->rowCount() === 0) {
		return FALSE;
	}

	return $resultado->fetch();	
}
?>