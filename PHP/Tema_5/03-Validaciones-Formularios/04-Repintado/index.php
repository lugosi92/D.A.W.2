<?php
include 'constants.php';
$valor_nombre = "";
$valor_password = "";
$valor_hidden = "";

$valor_radio = '';

$valores_checkbox = array();

$valores_select_simple = "";
$valores_select_multiple = array();

$valor_radio = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor_nombre = $_POST[NAME];
    $valor_password = $_POST[PASSWORD];

    $valor_radio = isset($_POST[RADIO]) ? $_POST[RADIO] : '';

    $valores_checkbox =  isset($_POST[CHECKBOX]) ? $_POST[CHECKBOX] : array();
    
    $valores_select_simple = $_POST[SELECT_SIMPLE];
    $valores_select_multiple =  isset($_POST[SELECT_MULTIPLE]) ? $_POST[SELECT_MULTIPLE] : array();

    if (
        empty($valor_nombre) ||
        empty($valor_password) ||
        empty($valor_hidden) ||
        count($valores_checkbox) <= 0 ||
        empty($valor_radio) ||
        empty($valores_select_simple) ||
        count($valores_select_multiple) <= 0
    ) {
        if (empty($valor_nombre)) $errName = "Campo nombre vacío";
        if (empty($valor_password)) $errPassword = "Campo contraseña vacío";
        // if(empty($valor_hidden)) $errHidden = "Campo escondido vacío";
        if (count($valores_checkbox) <= 0) $errCheckbox = "Campo checkbox vacío";
        if (empty($valor_radio)) $errRadio = "Campo radio vacío";
        if(empty($valores_select_simple)) $errSelectS = "Campo select simple vacío";
        if(count($valores_select_multiple) <= 0) $errSelectM = "Campo select multiple vacío";
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

<body>
    <h1>Recibe parametros y repinta el formulario</h1>
    <form
        method="post"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>CAMPOS DE TEXTO</h2>
        <label for="">Nombre</label>
        <input
            name="<?php echo NAME ?>"
            type="text"
            value="<?php if (isset($valor_nombre)) echo $valor_nombre ?>">
        <br>
        <label for="">Contraseña</label>
        <input
            name="<?php echo PASSWORD ?>"
            type="password"
            value="<?php if (isset($valor_password)) echo $valor_password ?>">
        <br>
        <label for="">Oculto</label>
        <input
            type="hidden">
        <br>
        <br>
        <h2>RADIO</h2>
        <label for="">Rojo</label>
        <input
            type="radio"
            name="<?php echo RADIO ?>"
            value="<?php echo RADIO_RED ?>"
            <?php if ($valor_radio === RADIO_RED) echo 'checked'; ?>>
        <label for="">Naranja</label>
        <input
            type="radio"
            name="<?php echo RADIO ?>"
            value="<?php echo RADIO_ORANGE ?>"
            <?php if ($valor_radio === RADIO_ORANGE) echo 'checked'; ?>>
        <label for="">Verde</label>
        <input
            type="radio"
            name="<?php echo RADIO ?>"
            value="<?php echo RADIO_GREEN ?>"
            <?php if ($valor_radio === RADIO_GREEN) echo 'checked'; ?>>
        <br>
        <h2>CHECKBOX</h2>
        
        <label for="<?php echo CHECKBOX_PUBLICIDAD; ?>">
            <input
                type="checkbox"
                name="<?php echo CHECKBOX."[]"; ?>"
                value="<?php echo CHECKBOX_PUBLICIDAD; ?>"
                id="<?php echo CHECKBOX_PUBLICIDAD; ?>"
                <?php if (in_array(CHECKBOX_PUBLICIDAD, $valores_checkbox)) echo 'checked'; ?>>
            Quiero recibir publicidad
        </label>
        <br>
        <label for="<?php echo CHECKBOX_TERMINOS ?>">
            <input
                type="checkbox"
                name="<?php echo CHECKBOX."[]"; ?>"
                value="<?php echo CHECKBOX_TERMINOS ?>"
                id="<?php echo CHECKBOX_TERMINOS ?>"
                <?php if (in_array(CHECKBOX_TERMINOS, $valores_checkbox)) echo 'checked'; ?>>
            Acepto los términos y condiciones
        </label>
        <br>
        <h2>SELECT</h2>
        <h2>Simple:</h2>
        <label for="<?php echo SELECT_SIMPLE ?>">
            Años de finalización de estudios:
        </label>
        <select 
            name="<?php echo SELECT_SIMPLE ?>"
            id="<?php echo SELECT_SIMPLE ?>">
            <option
            <?php if(empty($valores_select_simple)) echo "selected";?> 
            value="">
        </option>
            <option 
                value="<?php echo SIMPLE_2020 ?>"
                <?php if($valores_select_simple === SIMPLE_2020) echo "selected";?>>
                <?php echo SIMPLE_2020 ?>
            </option>
            <option 
                value="<?php echo SIMPLE_2021 ?>"
                <?php if($valores_select_simple === SIMPLE_2021) echo "selected";?>>
                <?php echo SIMPLE_2021 ?>
            </option>
            <option 
                value="<?php echo SIMPLE_2022 ?>"
                <?php if($valores_select_simple === SIMPLE_2022) echo "selected";?>>
                <?php echo SIMPLE_2022 ?>
            </option>
        </select>
        <h2>Multiple:</h2>
        <select 
            name="<?php echo SELECT_MULTIPLE . "[]"?>" 
            id="<?php echo SELECT_MULTIPLE ?>" 
            multiple>
            <option 
                value="<?php echo MULTIPLE_GERONA ?>"
                <?php if(in_array(MULTIPLE_GERONA, $valores_select_multiple)) echo "selected";?>>
                Gerona
            </option>
            <option 
                value="<?php echo MULTIPLE_ZARAGOZA ?>"
                <?php if(in_array(MULTIPLE_ZARAGOZA, $valores_select_multiple)) echo "selected";?>>
                Zaragoza
            </option>
            <option 
                value="<?php echo MULTIPLE_MADRID ?>"
                <?php if(in_array(MULTIPLE_MADRID, $valores_select_multiple)) echo "selected";?>>
                Madrid
            </option>
        </select>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (isset($errName)) echo "<p>$errName</p>";
    if (isset($errPassword)) echo "<p>$errPassword</p>";
    if (isset($errCheckbox)) echo "<p>$errCheckbox</p>";
    if (isset($errRadio)) echo "<p>$errRadio</p>";
    if (isset($errSelectS)) echo "<p>$errSelectS</p>";
    if (isset($errSelectM)) echo "<p>$errSelectM</p>";
    ?>

</body>

</html>