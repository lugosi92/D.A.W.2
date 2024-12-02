<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Comprueba si se está haciendo un POST en el HTML

    $usuario = $_POST['usuario'];
    $clave = $_POST["clave"];

    $cont = 0;
    $encontrado = false;

    while ($cont < count($usuarios) && !$encontrado) {
        $usuario_cont = $usuarios[$cont]["usuario"];
        $clave_cont = $usuarios[$cont]["clave"];
        if ($usuario_cont === $usuario && $clave_cont === $clave ) $encontrado = true;
        else $cont++;
    }

    /* si va bien redirige a principal.php si va mal, mensaje de error */
    if ($encontrado) header("Location: principal.php");
    else $err = "Revise usuario y contraseña";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if (isset($err)) echo "<p>$err</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // se envia el post al mismo archivo
                    ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario)) echo $usuario; ?>"
            id="usuario" name="usuario" type="text">

        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">

        <input type="submit">
    </form>
</body>

</html>