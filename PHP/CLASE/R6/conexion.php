<?php
$usuario = 'prueba1';   // Nombre de usuario
$contraseña = 'prueba1';   // Contraseña

try {
    $mbd = new PDO('mysql:host=localhost;dbname=prueba1', $usuario, $contraseña);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>