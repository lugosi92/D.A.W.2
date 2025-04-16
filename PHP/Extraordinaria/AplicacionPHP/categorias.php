<?php

require_once "conexion.php";
require 'cabecera.php';

require_once "funciones/comprobar_sesion.php";
require_once "funciones/cargar_categorias.php";


comprobar_sesion();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de categorías</title>
    <link rel="stylesheet" href="css/categorias.css">
</head>

<body>
    <h1>Lista de categorías</hl>

<?php

 $resultado  = cargar_categorias();


// Conectarse con XML
if (!$resultado) {
    echo "Error al conectar con la base datos";
} else {
    echo "<ul>";
    foreach ($resultado as $res) {
        // Se crea una url con el parametro de categoria 
        $url = "productos.php?categoria=" . $res['codCategoria']; 
        echo "<li><a href='$url'>" . $res['nombre'] . "</a></li>";
    }
    echo "</ul>";
}
?>
</body>
</html>