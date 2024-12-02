<?php
include '../../controller/UsuarioController.php';
const INPUT_TEXT = "usuario";
const INPUT_PASSWD = "constraseña";

$usuarioController = new UsuarioController();

$valor_usuario = '';
$valor_password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor_usuario = $_POST[INPUT_TEXT];
    $valor_password = $_POST[INPUT_PASSWD];

    if (!empty($valor_usuario) && !empty($valor_password)) {
        try {
            $register = $usuarioController->createUser(null, $valor_usuario, $valor_password);
            if ($register) $message = 'Usuario registrado';
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
    body {
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
        z-index: 10;
    }

    form label {
        text-align: start;
    }

    .error {
        color: red;
    }

    .message {
        color: green;
    }

    form a {
        margin-bottom: 20px;
    }

    form input[type="text"],
    form input[type="password"] {
        padding: 5px;
        border-radius: 10px;
    }
</style>

<body>
    <h1>Registrarse</h1>
    <form
        method="post"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">Usuario</label>
        <input
            type="text"
            value="<?php if (!empty($valor_usuario)) echo $valor_usuario ?>"
            name="<?php echo INPUT_TEXT ?>">
        <br>
        <label for="">Contraseña</label>
        <input
            type="password"
            value="<?php if (!empty($valor_password)) echo $valor_password ?>"
            name="<?php echo INPUT_PASSWD ?>">
        <br>
        <?php if (isset($err)) echo "<span class =\"error\">$err</span>" ?>
        <?php if (isset($message)) echo "<span class =\"message\">$message</span>" ?>
        <br>
        <a href="login.php">¿Tienes cuenta?</a>
        <button type="submit">Registrarse</button>
    </form>
</body>

</html>