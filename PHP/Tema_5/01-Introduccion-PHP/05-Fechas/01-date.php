<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fecha Actual:</h1>
    <?php
        // fecha actual
        $timestamp = time();
        $fecha = date("d-m-y H:i:s", $timestamp);

        // mostrar resultados
        echo "La marca de tiempo en el servidor ahora mismo es $timestamp <br>";
        echo "Que corresponde con : $fecha <br>";

        echo date("l");
    ?>
</body>
</html>