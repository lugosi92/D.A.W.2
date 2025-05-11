<?php

require_once "conexion.php";
require_once "funciones/comprobar_usuario.php";

session_start();

$estadoLog = "";
$errLog = "Usuario o contraseña incorrecta";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['correo'];
    $clave = $_POST['clave'];

    $login = comprobar_usuario($usuario, $clave);

    if (!$login) {
        $estadoLog = $errLog;
    } else {
        $_SESSION['correo'] = $usuario; 
        $_SESSION['carrito'] = [];

        $_SESSION['usuario'] = [
            'correo' => $login['correo'],
            'es_admin' => $login['es_admin'] 
        ];

        header("Location: categorias.php");
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


