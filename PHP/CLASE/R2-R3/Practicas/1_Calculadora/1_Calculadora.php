<?php
$_GET["variable1"]; //Aqui esta el 7
$_GET["variable2"]; //Aqui esta el 9
$_GET["operador"];

$variable1 =  $_GET["variable1"]; //Aqui esta el 7
$variable2 =  $_GET["variable2"]; //Aqui esta el 9
$operador = $_GET["operador"];

$resultado = 0;

switch($operador){
    case"suma":
        $resultado = $variable1 + $variable2;
        break;
    case "resta":
        $resultado = $variable1 - $variable2;
        break;
    case "multiplicacion":
        $resultado = $variable1 * $variable2;
        break;
    case "division":
        $resultado = $variable1 / $variable2;
        break;
}

echo "El resultado es: " .  $resultado;

?>