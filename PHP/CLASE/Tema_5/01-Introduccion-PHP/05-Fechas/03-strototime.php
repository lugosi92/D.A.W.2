<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Ahora: ", date("d-m-Y H:i:s", strtotime("now")), "<br />\n";
    echo "8-mayo-01: ", date("d-m-Y", strtotime("8 May 2001")), "<br />\n";
    echo "Mañana: ", date("d-m-Y H:i:s", strtotime("+1 day")), "<br />\n";
    echo "Dentro de una semana: ", date("d-m-Y H:i:s", strtotime("+1 week")), "<br />\n";
    echo "Dentro de 1 semana, 2 días, 4 horas y 2 segundos: ", date("d-m-Y H:i:s", strtotime("+1 week 2 days 4 hours 2 seconds")), "<br />\n";
    echo "Próximo sábado: ", date("D, d-m-Y", strtotime("next Saturday")), "<br />\n";
    echo "Último domingo: ", date("D, d-m-Y", strtotime("last Sunday")), "<br />\n";
    ?>
</body>

</html>