<?php
echo "<br>Error: " . $_FILES["fichero"]["error"];
$tam = $_FILES["fichero"]["size"];
if ($tam > 256 * 1024) {
    echo "<br>Demasiado grande";
    return;
}
echo "Nombre del fichero: " . $_FILES["fichero"]["name"];
echo "<br>Extensión del archivo " . $_FILES["fichero"]["type"];
echo "<br>Nombre temporal del fichero en sel servidor: " . $_FILES["fichero"]["tmp_name"];
$res = move_uploaded_file($_FILES["fichero"]["tmp_name"], "./subidos/" . $_FILES["fichero"]["name"]);
if ($res) {
    echo "<br>Fichero guardado";
} else {
    echo "<br>Error";
}
 