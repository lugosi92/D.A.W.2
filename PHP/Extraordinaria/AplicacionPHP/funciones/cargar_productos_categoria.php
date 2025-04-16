<?php

function cargar_productos_categoria($codCat){

	$res = leer_config(__DIR__ . "/configuracion.xml", __DIR__ . "/configuracion.xsd");

	$bd = new PDO($res[0], $res[1], $res[2]);	

	$sql = "select * from productos where codCategoria  = $codCat";	

	$resultado = $bd->query($sql);	
    
	if (!$resultado || $resultado->rowCount() === 0) {
		return FALSE;
	}	

	//si hay 1 o más
	return $resultado;			
}