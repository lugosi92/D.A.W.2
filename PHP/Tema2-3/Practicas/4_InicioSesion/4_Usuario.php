<?php
/*si va bien redirige a principal.php 
si va mal, mensaje de error */  


$usuarios = array(
	"usuario"  => "1234",
 	"usuario1" => "2345",
	"usuario2" => "7896",
	"usuario3" => "3456",
	"usuario4" => "4567"
);

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$autenticacion = false;


foreach($usuarios as $nombre => $contraseña){
	if($usuario === $nombre &&  $clave === $contraseña){
		$autenticacion = true;
	} 

}

if($autenticacion){
	header("Location:Bienvenido.html");
} else {
	header("Location:error.html");
} 

