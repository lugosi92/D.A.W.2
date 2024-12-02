<?php
include 'constants.php';
include 'model/Usuario/UsuarioModel.php';
include 'model/Usuario/Usuario.php';
include 'connection/mysqli.php';
// Con mysqli
$db1 = new DatabaseMySQLi();
$connection = $db1->getConnection();

// Esto seria con PDO
// include 'connection/pdo.php';
// $db1 = new DatabasePDO();
// $connection = $db1->getConnection();

$valor_usuario = '';
$valor_password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor_usuario = $_POST[INPUT_TEXT];
    $valor_password = $_POST[INPUT_PASSWD];

    if (!empty($valor_usuario) && !empty($valor_password)) {
        // $usuario_cliente = (array) new Usuario($valor_usuario, $valor_password); // Usando PDO

        try {
            $login = getOneUserByCredentials($connection, $valor_usuario, $valor_password);
            if ($login !== null) header("Location:main.php");
            else $err = 'El usuario no existe';
        } catch (Exception $e) {
            print "¡Error!: " . $e->getMessage() . "<br>";
        }
    } else {
        if (empty($valor_usuario)) $err = 'Usuario vacío';
        else if (empty($valor_password)) $err = 'Contraseña vacía';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        position: absolute;
        top: 25%;
        width: 25%;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    form label {
        text-align: start;
    }

    form span {
        color: red;
    }

    form a {
        margin-bottom: 20px;
    }

    form input[type="text"], form input[type="password"]  {
        padding: 5px;
        border-radius: 10px;
    }
</style>

<body>
    <form
        method="post"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">Usuario</label>
        <input
        type="text"
        value="<?php if(!empty($valor_usuario)) echo $valor_usuario?>"
        name="<?php echo INPUT_TEXT ?>">
        <br>
        <label for="">Contraseña</label>
        <input
        type="password"
        value="<?php if(!empty($valor_password)) echo $valor_password?>"
        name="<?php echo INPUT_PASSWD ?>">
        <br>
        <span><?php if (isset($err)) echo $err ?></span>
        <br>
        <a href="registro.php">¿No tienes cuenta?</a>
        <button type="submit">Inciar sesión</button>
    </form>
</body>

</html>