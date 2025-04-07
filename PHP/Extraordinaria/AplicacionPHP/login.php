<?php

require_once "conexion.php";
session_start();

$usuario = $clave = "";

$errLog = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset())
    $usuario = comprobar_usuario($_POST['usuario'], $_POST['clave']);

        if(!$usuario){
            $err = TRUE;
            $usuario = $_POST['usuario'];
        }else{
            $_SESSION['usuario'] = $usuario;
            $_SESSION['carrito'] = [];

        header("Location: categorías.php");
        return;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


    <form action = "<?php $_SERVER["PHP_SELF"];?>" method = "POST">

        <!-- USUARIO -->
        <label>Usuario</label>
        <input type = "text" name = "titulo" id = "usuario"
         value = "<?php ?>">
        
        <!-- CLAVE -->
        <label for = "clave">Clave</label>
        <input type = "password" name = "clave" id = "clave"
         value = "<?php ?>">


        <input type = "submit">

</body>
</html>


