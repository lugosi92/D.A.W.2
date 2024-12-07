<?php

/*-----------------1.PDO--Orientada a objetos------------------------*/

/*
new PDO($dsn, $usuario, $password);
$dsn = "mysql:host=localhost;dbname=mi_base_de_datos;charset=utf8";
$usuario = "root";
$password = "mi_contraseña";*/

// Credenciales de la base de datos
include 'config.php';

try {
    // Crear conexión PDO pbjeto
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

    // Configurar para que muestre excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}



/*-----------------2.SQL--Orientada a objetos------------------------*/
// Credenciales de la base de datos
include 'config.php';

// Crear conexión
$mysqli = new mysqli($host, $user, $password, $db);

// Comprobar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
echo "Conexión exitosa";




/*-----------------3.SQL--Procedimental------------------------*/
// Credenciales de la base de datos
include 'config.php';

// Crear conexión
$conn = mysqli_connect($host, $user, $password, $db);

// Comprobar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa";

?>