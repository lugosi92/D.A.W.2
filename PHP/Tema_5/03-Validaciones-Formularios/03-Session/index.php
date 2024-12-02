<?php
include 'constants.php';
session_start();
$valor_texto = '';
$valor_tipo_busqueda = '';
$valor_genero = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $valor_texto = $_POST[TEXTO_BUSCAR];
    $valor_tipo_busqueda = isset($_POST[TIPO_BUSQUEDA]) ? $_POST[TIPO_BUSQUEDA] : '';
    $valor_genero = $_POST[GENERO];
    if (
        empty($valor_texto) ||
        empty($valor_tipo_busqueda) ||
        empty($valor_genero)
    ) {
        if (empty($valor_texto)) $err1 = "Error, debes rellenar el buscador";
        if (empty($valor_tipo_busqueda)) $err2 = "Error, debes elegir un filtro de búsqueda";
        if (empty($valor_genero)) $err3 = "Error al elegir un genero";
    } else {
        $_SESSION[TEXTO_BUSCAR] = $valor_texto;
        $_SESSION[TIPO_BUSQUEDA] = $valor_tipo_busqueda;
        $_SESSION[GENERO] = $valor_genero;
        header("Location: resultados.php");
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
        .error {
            color: red;
        }

        .error-form {
            border: 1px solid red;
        }

        .normal-form {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Formulario simple</h1>
    <?php
    if (isset($err1)) echo "<p class=\"error\">$err1</p>";
    if (isset($err2)) echo "<p class=\"error\">$err2</p>";
    if (isset($err3)) echo "<p class=\"error\">$err3</p>";
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <legend>Búsqueda de canciones</legend>
        <label for="<?php echo TEXTO_BUSCAR; ?>">Texto de búsqueda</label>
        <input
            type="text"
            class="<?php echo isset($err1) ? 'error-form' : 'normal-form'; ?>"
            name="<?php echo TEXTO_BUSCAR ?>"
            value="<?php if (isset($valor_texto)) echo $valor_texto; ?>">
        <br>

        <label for="<?php echo TIPO_BUSQUEDA ?>">Buscar en: </label>

        <input
            type="radio"
            name="<?php echo TIPO_BUSQUEDA ?>"
            value="<?php echo TITULO_CANCION ?>"
            <?php if ($valor_tipo_busqueda === TITULO_CANCION) echo "checked"; ?>>
        <label
            for="<?php echo TIPO_BUSQUEDA ?>">
            Nombre de la cancion
        </label>

        <input
            type="radio"
            name="<?php echo TIPO_BUSQUEDA ?>"
            value="<?php echo NOMBRE_ALBUM ?>"
            <?php if ($valor_tipo_busqueda === NOMBRE_ALBUM) echo "checked"; ?>>
        <label for="<?php echo TIPO_BUSQUEDA ?>">Nombre del album</label>

        <input
            type="radio"
            name="<?php echo TIPO_BUSQUEDA ?>"
            value="<?php echo AMBOS_CAMPOS ?>"
            <?php if ($valor_tipo_busqueda === AMBOS_CAMPOS) echo "checked"; ?>>
        <label
            for="<?php echo TIPO_BUSQUEDA ?>">
            Ambos campos
        </label>
        <br>

        <label for="genero">Genero musical: </label>
        <select 
            name="<?php echo GENERO ?>" 
            class="<?php echo isset($err1) ? 'error-form' : 'normal-form'; ?>">
            <option 
                value=""
                <?php if(empty($valor_genero)) echo 'selected';?>   
            ></option>
            <option 
                value="<?php echo TODOS ?>"
                >
                <?php echo TODOS ?>
            </option>
            <option 
                value="<?php echo ACUSTICA ?>"
                <?php if($valor_genero === ACUSTICA) echo 'selected';?>>
                <?php echo ACUSTICA ?>
            </option>
            <option 
                value="<?php echo BLUES ?>"
                <?php if($valor_genero === BLUES) echo 'selected';?>>
                <?php echo BLUES ?>
            </option>
            <option 
                value="<?php echo POP ?>"
                <?php if($valor_genero === POP) echo 'selected';?>>
                <?php echo POP ?>
            </option>
        </select>
        <br>
        <button type="submit">Buscar</button>
    </form>
</body>

</html>