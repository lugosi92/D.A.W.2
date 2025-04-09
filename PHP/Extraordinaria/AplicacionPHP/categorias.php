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
</head>

<body>
    <hl>Lista de categorías</hl>

<?php

if (!cargar_categorias()) {
    echo "Error al conectar con la base datos";
} else {
    echo "<ul>"; //abrir la lista
    foreach ($categorias as $cat) {
        /*$cat['nombre] $cat['codCat']*/
        $url = "productos.php?categoria=" . $cat['codCat'];
        echo "<li><a href='$url'>" . $cat['nombre'] . "</a></li>";
    }
    echo "</ul>";
}
?>
</body>
</html>