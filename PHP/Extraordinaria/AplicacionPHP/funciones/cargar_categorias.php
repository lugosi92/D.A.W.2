<?php

function cargar_categorias(){
    
	$resultado = leer_config(dirname(__FILE__)."configuracion.xml", dirname(__FILE__)."configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$ins = "select codCategoria, nombre from categoria";

	$resultado = $bd->query($ins);	

    
	if (!$resul || $resul->rowCount() === 0) {
		return FALSE;
	}
	

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