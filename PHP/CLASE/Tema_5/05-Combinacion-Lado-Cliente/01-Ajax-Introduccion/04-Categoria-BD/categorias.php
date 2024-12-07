<?php
header("Content-Type: application/json; charset=UTF-8");
function cargar_categorias()
{
    $dbname = 'tienda';
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $bd = new PDO($dsn, "root", "");
    $ins = "select codCat, nombre from categorias";
    $resul = $bd->query($ins);
    $resultados = array();
    foreach ($resul as $row) {
        $rowArray = array("codCat" => $row['codCat'], "nombre" => $row['nombre']);
        array_push($resultados, $rowArray);
    }

    echo json_encode($resultados);
}

cargar_categorias();
