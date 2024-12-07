<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $variable1 = $_GET["variable1"];
        $variable2 = $_GET["variable2"];
    ?>
    <p>
        Variable1 =
        <?php echo $variable1 . "<br>"; ?>
    </p>
    <p>
        Variable2 =
        <?php echo $variable2; ?>
    </p>
    <p><?php echo "Suma = " . $variable1 + $variable2;?></p>
</body>

</html>