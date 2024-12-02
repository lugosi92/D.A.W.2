<?php
include 'constants.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $valor_texto = $_POST[TEXTO_BUSCAR];
    $valor_busqueda = $_POST[TIPO_BUSQUEDA];
    $valor_genero = $_POST[GENERO];
    if (
        empty($_POST[TEXTO_BUSCAR]) ||
        empty($_POST[TIPO_BUSQUEDA]) ||
        empty($_POST[GENERO])
    )
        $err = "Error en la busqueda, rellena los campos";
    else header("Location: resultados.php?" . TEXTO_BUSCAR . "=$valor_texto&" . TIPO_BUSQUEDA . "=$valor_busqueda&" . GENERO . "=$valor_genero");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario simple</h1>
    <?php
    if (isset($err)) echo "<p>$err</p>";
    unset($err);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <legend>Búsqueda de canciones</legend>
        <label for="<?php echo TEXTO_BUSCAR ?>">Texto de búsqueda</label>
        <input type="text" name="<?php echo TEXTO_BUSCAR ?>">
        <br>

        <label for="<?php echo TIPO_BUSQUEDA ?>">Buscar en: </label>

        <input type="radio" name="<?php echo TIPO_BUSQUEDA ?>" value="<?php echo TITULO_CANCION ?>">
        <label for="<?php echo TIPO_BUSQUEDA ?>">Nombre de la cancion</label>

        <input type="radio" name="<?php echo TIPO_BUSQUEDA ?>" value="<?php echo NOMBRE_ALBUM ?>">
        <label for="<?php echo TIPO_BUSQUEDA ?>">Nombre del album</label>

        <input type="radio" name="<?php echo TIPO_BUSQUEDA ?>" value="<?php echo AMBOS_CAMPOS ?>">
        <label for="<?php echo TIPO_BUSQUEDA ?>">Ambos campos</label>
        <br>

        <label for="genero">Genero musical: </label>
        <select name="<?php echo GENERO ?>" id="">
            <option value="<?php echo TODOS ?>" selected><?php echo TODOS ?></option>
            <option value="<?php echo ACUSTICA ?>"><?php echo ACUSTICA ?></option>
            <option value="<?php echo BLUES ?>"><?php echo BLUES ?></option>
            <option value="<?php echo POP ?>"><?php echo POP ?></option>
        </select>
        <br>
        <button type="submit">Buscar</button>
    </form>
</body>

</html>