<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Fecha Actual con getdate()</h1>
    <?php
    $datos = getdate(); // transforma la info del date en un array clave valor
    echo "<table>";
    echo "<tr>
            <th>Clave</th>
            <th>Información</th>
        </tr>";
    foreach ($datos as $clave => $info) {
        echo "<tr>
                <td>$clave</td>
                <td>$info</td>
            </tr>";
    }
    echo "</table>";
    ?>
</body>
<style>
    table {
        border-collapse: collapse;
        text-align: center;
    }

    td,
    th {
        border: 1px solid black;
        padding: 5px;
    }
</style>

</html>