<?php
/*si va bien redirige a principal.php 
si va mal, mensaje de error */

$usuarios = array(
    array(
        "usuario" => "Neil",
        "clave" => "1234"
    ),
    array(
        "usuario" => "Pepe",
        "clave" => "123"
    ),
    array(
        "usuario" => "Juan",
        "clave" => "123456"
    ),
    array(
        "usuario" => "Lola",
        "clave" => "12"
    ),
    array(
        "usuario" => "Luis",
        "clave" => "1234"
    ),
);

$usuario_cliente = array (
    "usuario" => $_POST['usuario'],
    "clave" => $_POST['clave']
);
$cont = 0;
$encontrado = false;

while($cont < count($usuarios) && !$encontrado){
    if($usuario_cliente === $usuarios[$cont]) $encontrado = true;
    else $cont++;

}

if ($encontrado) header("Location:index.html");
else header("Location:error.php");

