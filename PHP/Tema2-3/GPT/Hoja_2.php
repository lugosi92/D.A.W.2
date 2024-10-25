<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php
    $x = 15;
    $y = 10;
    echo $x == $y, "<br>";
    echo $x != $y, "<br>";
    echo $x < $y, "<br>";
    echo $x > $y, "<br>";
    echo $x <= $y, "<br>";
    echo $x >= $y, "<br>";
    ?>
    <h2>Ejercicio 2</h2>
    <?php
    $a = 5;
    $b = 7;
    $c = 5;
    echo ($a == $b) && ($c > $b), "<br>";
    echo ($a == $c) || ($b >= $c),"<br>";
    echo !($a < $c), "<br>";
    ?>
    <h2>Ejercicio 3</h2>
    <?php
    $precio = 150.75;
    $IVA = 0.21;

    $precioTotal = $precio + ($precio * $IVA);

    echo "Precio total: " . $precioTotal . "<br>";
    echo "Precio con round: " . round($precioTotal) . "<br>";
    echo "Preco con sprintf: " . sprintf("%0.2f", $precioTotal);
    ?>
    <h2>Ejercicio 4</h2>
    <?php
    $var = "PHP";
    if (isset($var)) echo "La variable está definida.<br>";
    if (!empty($var)) echo "La variable no está vacía.<br>";
    unset($var);
    if (!isset($var)) echo "La variable ha sido eliminada.<br>";
    ?>
    <h2>Ejercicio 5</h2>
    <?php
        $num = 10;
        echo $num, "<br>"; // 10
        $num += 5;
        echo $num, "<br>"; // 15
        echo ++$num, "<br>"; // 16 (pre-incremento)
        echo $num++, "<br>"; // 16 (post-incremento, muestra antes de incrementar)
        echo $num; // 17
    ?>
    

</body>
</html>