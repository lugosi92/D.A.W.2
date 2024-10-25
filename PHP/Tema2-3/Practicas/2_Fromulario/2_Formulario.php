<?php
$variable1 = $_POST["num1"];
$variable2 = $_POST["num2"];
$operador = $_POST["op"];

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

echo "El resultado es: " . $resultado;

