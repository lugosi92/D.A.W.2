<?php
/*si va bien redirige a principal.php 
si va mal, mensaje de error */  

session_start();

    // 1. CONEXION CON LA BASE DE DATOS
    $usuarioBD = 'root';   // Nombre de usuario
    $contraseña = '';   // Contraseña

    try {
        $bd = new PDO('mysql:host=localhost;dbname=usuarios', $usuarioBD, $contraseña);
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

   
    // 2. COMPROBAR ERROR Y REPINTADO
    $errUsuario = $errContraseña = "";
    $user = $clave = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  	

        // REPINTADO Y ERROR
        if(empty($_POST['usuario'])){
            $errUsuario = "Introduzca usuario";
        }else{
            $user = $_POST['usuario'];
        }
        if(empty($_POST['clave'])){
            $errContraseña = "Introduzca contraseña";
        } else {
            $clave = $_POST['clave']; // Guardamos el valor de la contraseña
        }

    // 3. SENTENCIAS PREPARADAS

    $query = $bd->prepare("SELECT * FROM usuarios WHERE user = :usuario AND clave = :contraseña");
    $query->bindParam(':usuario', $user);
    $query->bindParam(':contraseña', $clave);
    $query->execute();

        // Si devuelve 1 o mas es que existe 
        if ($query->rowCount()) { 
            $_SESSION['usuario'] = $user; //Guardamos 
            header("Location: principal1.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
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
        type = "password" id = "password" name = "clave">
        <span class = "error"> <?php echo $errContraseña; ?></span>

        <br>
        <input type  = "submit">

    </fieldset>
</div>
    </form>
</body>
</html>

