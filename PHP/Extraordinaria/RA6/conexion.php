<?php 

$host = "localhost";
$dbname = 'noticias';
$usuario = 'admin3';
$clave = '1234';

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
    echo "Conexion realizada con exito";

} catch(PDOException $e){
    echo "Error de conexion: ". $e->getMessage();
}