<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores Matemáticos</title>
    <style>
        .resultado {
            font-weight: bold;
            color: blue;
        }
    </style>
</head>
<body>
    <?php include("Video12/calculo.php"); ?>
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
            <input type="submit" name="button" id="button" value="Calcular">
        </p>
    </form>
</body>
</html>
