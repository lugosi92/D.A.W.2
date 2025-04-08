
<?php

$host = "localhost";
$dbname = 'noticias';
$usuario = 'admin3';
$clave = '1234';

$estadoConexion = "";

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
    $estadoConexion = "Conexion realizada con exito";

} catch(PDOException $e){
    $estadoConexion = "Error de conexion: ". $e->getMessage();
}