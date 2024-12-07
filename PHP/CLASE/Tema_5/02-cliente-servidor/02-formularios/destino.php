<?php
    $valor_num1 = $_POST["num1"];
    $valor_num2 = $_POST["num2"];
    $valor_operacion = $_POST["operacion"];
    $valor_textarea = $_REQUEST["textarea"];
    $valor_radio = $_REQUEST["radio"];
    $valores_operaciones_mul = $_REQUEST['operaciones_mul'];
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

        echo "El resultado es $resultado <br> ";
        echo "Text: num1: $valor_num1 <br> num2: $valor_num2 <br> operacion: $valor_operacion <br>";
        echo "Textarea: $valor_textarea <br>";
        echo "Radio: $valor_radio <br>";
        echo "Select multiple: <br>";
        foreach($operacion as $valores_operaciones_mul){
            echo "$operacion <br>";
        }
        
    ?>
</body>
</html>