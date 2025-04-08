<?php 

$host = "localhost";
$dbname = 'aplicacion';
$usuario = 'adminAplicacion';
$clave = '1234';

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);

} catch(PDOException $e){
    echo "Error de conexion: ". $e->getMessage();
}