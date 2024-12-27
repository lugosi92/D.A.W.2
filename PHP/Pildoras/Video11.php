<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Operadores Matematicos </title>

</head>
<body>
<?php
/*------------------------------------VIDEO 11 Operadores matematicos---------------------------------------------------*/

/* 
    + 
    -
    *
    /
    %
    ++  +=
    -- -=
*/

if(isset($_POST["button"])){

    $numero1 = (float) $_POST["num1"]; // Convertir a número flotante
    $numero2 = (float) $_POST["num2"];

    $operacion = $_POST["operacion"];

    $resultado = null;

    if(strcasecmp("Suma", $operacion) == 0){
        $resultado = $numero1 + $numero2;
    }else if(strcasecmp("Resta", $operacion) == 0){
        $resultado = $numero1 - $numero2;
    }else if(strcasecmp("Multiplicación", $operacion) == 0){
        $resultado = $numero1 * $numero2;
    }else if(strcasecmp("División", $operacion) == 0){
        $resultado = $numero1 / $numero2;
    }else if(strcasecmp("Módulo", $operacion) == 0){
        $resultado = $numero1 % $numero2;
    }else{
        echo "Mal";
    }

    echo $resultado;
}


?>
<p>&nbsp;</p>
<form name="form1" method="post" action="#">
    <p>
        <label for="num1">Número 1:</label>
        <input type="text" name="num1" id="num1">
    </p>
    <p>
        <label for="num2">Número 2:</label>
        <input type="text" name="num2" id="num2">
    </p>
    <p>
        <label for="operacion">Operación:</label>
        <select name="operacion" id="operacion">
            <option>Suma</option>
            <option>Resta</option>
            <option>Multiplicación</option>
            <option>División</option>
            <option>Módulo</option>
            <option>Incremento</option>
            <option>Decremento</option>
        </select>
    </p>
    <p>
        <input type="submit" name="button" id="button" value="Enviar" onClick="prueba()">
    </p>
</form>
<p>&nbsp;</p>
</body>
</html>