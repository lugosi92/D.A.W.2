<?php
include 'constants.php';
include 'validaciones.php';
session_start();

$valor_titulo = "";
$errores_titulo = array();
$valor_texto = "";
$errores_texto = array();
$valor_categoria = "";
$valor_imagen = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor_titulo = $_POST[TITULO];
    $errores_titulo = validarTitulo($valor_titulo);

    $valor_texto = $_POST[TEXTO];
    $errores_texto = validarTexto($valor_texto);

    $valor_categoria = $_POST[CATEGORIA];

    if (empty($errores_titulo) && empty($errores_texto)) {
        $resultado_imagen = subirArchivo(IMAGE, DIR);
        if ($resultado_imagen === true) {
            header("Location: results.php?" . TITULO . "=$valor_titulo&" . TEXTO . "=$valor_texto&" . CATEGORIA . "=$valor_categoria");
            exit();
        }
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
    .errores {
        color: red;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <h1>Subida de ficheros</h1>
    <h2><i>Insertar nueva noticia</i></h2>

    <form
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method="POST"
        enctype="multipart/form-data">
        <label for="<?php echo TITULO ?>">Titulo*</label>
        <input
            type="text"
            name="<?php echo TITULO ?>"
            value="<?php if (isset($valor_titulo)) echo $valor_titulo; ?>"
            id="<?php echo TITULO ?>">
        <?php pintarErrores($errores_titulo) ?>
        <br><br>
        <label for="<?php echo TEXTO ?>">Texto*</label>
        <textarea
            name="<?php echo TEXTO ?>"
            id="<?php echo TEXTO ?>"
            rows="5"
            cols="40"><?php if (isset($valor_texto)) echo $valor_texto; ?></textarea>
        <?php pintarErrores($errores_texto) ?>

        <br><br>
        <label for="<?php echo CATEGORIA ?>">Categoria*</label>
        <select
            name="<?php echo CATEGORIA ?>"
            id="<?php echo CATEGORIA ?>">
            <option
                value="<?php echo ARRAY_CATEGORIAS["pr"] ?>"
                <?php if ($valor_categoria === ARRAY_CATEGORIAS["pr"]) echo SELECTED; ?>>
                <?php echo ARRAY_CATEGORIAS["pr"] ?>
            </option>
            <option
                value="<?php echo ARRAY_CATEGORIAS["lo"] ?>"
                <?php if ($valor_categoria === ARRAY_CATEGORIAS["lo"]) echo SELECTED; ?>>
                <?php echo ARRAY_CATEGORIAS["lo"] ?>
            </option>
            <option
                value="<?php echo ARRAY_CATEGORIAS["nc"] ?>"
                <?php if ($valor_categoria === ARRAY_CATEGORIAS["nc"]) echo SELECTED; ?>>
                <?php echo ARRAY_CATEGORIAS["nc"] ?>
            </option>
            <option
                value="<?php echo ARRAY_CATEGORIAS["pi"] ?>"
                <?php if ($valor_categoria === ARRAY_CATEGORIAS["pi"]) echo SELECTED; ?>>
                <?php echo ARRAY_CATEGORIAS["pi"] ?>
            </option>
        </select>
        <br><br>
        <label for="<?php echo IMAGE; ?>">Imagen:</label>
        <input
            type="file"
            name="<?php echo IMAGE . "[]"; ?>"
            multiple
            accept="image/jpeg, image/png, image/gif">
        <?php if (isset($resultado_imagen) && $resultado_imagen) pintarErrores([$resultado_imagen]); ?>

        <br><br>
        <button type="submit">Enviar</button>
    </form>

</body>

</html>