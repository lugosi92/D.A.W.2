<?php

require_once "conexion.php";
require_once "funciones/comprobar_usuario.php";

session_start();

$estadoLog = "";
$errLog = "Usuario o contraseña incorrecta";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $usuario = comprobar_usuario($correo, $clave); // Aquí ya es el array asociativo

    if (!$usuario) {
        $estadoLog = "Usuario o contraseña incorrecta";
    } else {
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['carrito'] = [];

        $_SESSION['usuario'] = [
            'correo' => $usuario['correo'],
            'es_admin' => $usuario['es_admin']
        ];

        if ($usuario['es_admin']) {
            header("Location: panel.php");
        } else {
            header("Location: categorias.php");
        }
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <!-- IMPORTAR CSS -->
     <link rel="stylesheet" href="css/login.css">   
</head>
<body>


    <form action = "<?php echo  $_SERVER["PHP_SELF"];?>" method = "POST">

    <span style="color:red;"> <?php echo $estadoLog;?> </span>
    
        <!-- CORREO -->
        <label>Correo</label>
        <input type = "text" name = "correo" id = "correo"
         value = "<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
        
        <!-- CLAVE -->
        <label>Clave</label>
        <input type = "password" name = "clave" id = "clave">


        <input type = "submit">
    </form>
</body>
</html>


