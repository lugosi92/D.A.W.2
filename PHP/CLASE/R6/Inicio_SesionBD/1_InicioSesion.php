<?php
session_start();



// 2. COMPROBAR ERROR Y REPINTADO
$errUsuario = $errContraseña = "";
$user = $clave = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // REPINTADO Y ERROR
    if(empty($_POST['usuario'])){
        $errUsuario = "Introduzca usuario";
    } else {
        $user = $_POST['usuario'];
    }
    if(empty($_POST['clave'])){
        $errContraseña = "Introduzca contraseña";
    } else {
        $clave = $_POST['clave']; // Guardamos el valor de la contraseña
    }


// 1. CONEXION CON LA BASE DE DATOS
$usuarioBD = 'root';   // Nombre de usuario
$contraseñaBD = '';    // Contraseña
    
try {
    $bd = new PDO('mysql:host=localhost;dbname=clientes', $usuarioBD, $contraseñaBD);

    // $pass=$bd->prepare("SELECT * FROM usuario WHERE usuario='$user' AND contraseña='$clave'");

    $query=$bd->prepare("SELECT * FROM usuario WHERE  usuario ='$user'");
    $result = $bd->query($query);
    $hash=$result->fetchColumn();

    if (password_verify($clave, $hash)){

        header("Location: principal.php");

    }else{
        $err=true;
    }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
<div>
    <fieldset>
        <legend>Inicio Sesion</legend>
   
        <label for = "usuario"> Introduce usuario: </label>
        <input value = "<?php if(isset($user)) echo $user;?>"
        type = "text" id = "usuario" name = "usuario">
        <span class = "error"> <?php echo $errUsuario ?></span>
        <br>

        <label for = "contraseña"> Introducir contraseña: </label>
        <input value = "<?php if(isset($clave)) echo $clave;?>"
        type = "text" id = "password" name = "clave">
        <span class = "error"> <?php echo $errContraseña; ?></span>

        <br>
        <input type  = "submit">

    </fieldset>
</div>
    </form>
</body>
</html>

