<?php
function leer_config($xml, $xsd){
	// Crea el objeto DOM para manipular el XML
	$config = new DOMDocument();
	$config->load($xml);

	// Valida el XML frente al esquema XSD
	if (!$config->schemaValidate($xsd)){ 
		throw new InvalidArgumentException("Revise fichero de configuración");
	}

	// Carga el XML con SimpleXML para extraer fácilmente los datos
	$datos = simplexml_load_file($xml);

	// Utiliza XPath para extraer los valores de las etiquetas
	$ip = $datos->xpath("//ip")[0];
	$nombre = $datos->xpath("//nombre")[0];
	$usu = $datos->xpath("//usuario")[0];
	$clave = $datos->xpath("//clave")[0];

	// Crea la cadena de conexión PDO. Por ejemplo, "mysql:dbname=aplicacion;host=127.0.0.1"
	$cad = sprintf("mysql:dbname=%s;host=%s", $nombre, $ip);

	// Devuelve un array con la cadena de conexión, el usuario y la clave
	return [$cad, $usu, $clave];
}
