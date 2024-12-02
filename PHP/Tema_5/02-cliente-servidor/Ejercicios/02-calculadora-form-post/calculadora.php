<?php
    $valor_num1 = $_POST["num1"];
    $valor_num2 = $_POST["num2"];
    $valor_operacion = $_POST["operacion"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $resultado = 0;
        switch($valor_operacion){
            case 'sumar':
                $resultado = $valor_num1 + $valor_num2;
                break;
            case 'restar':
                $resultado = $valor_num1 - $valor_num2;
                break;
            case 'multiplicar':
                $resultado = $valor_num1 * $valor_num2;
                break;
            case 'dividir':
                $resultado = $valor_num1 / $valor_num2;
                break;
        }

        echo "El resultado es " . $resultado;
    ?>
</body>
</html>