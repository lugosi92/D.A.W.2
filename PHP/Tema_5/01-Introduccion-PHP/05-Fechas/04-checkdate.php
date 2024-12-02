<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Determinamos si existió el 29/02/2004 
    echo (checkdate(2, 29, 2004)) ? 'SÍ' : 'NO'; echo " existió el 29-02-2004<br />\n";
    // Probamos ahora el 29/02/2005
    echo (checkdate(2, 29, 2005)) ? 'SÍ' : 'NO'; echo " existió el 29-02-2005\n";
    ?>
</body>

</html>