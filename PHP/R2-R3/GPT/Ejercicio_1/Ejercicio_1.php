<?php

if (isset( $_GET["longitud"]) && isset($_GET["ancho"])){
    $longitud = $_GET["longitud"];
    $ancho = $_GET["ancho"];

if(is_numeric($longitud) && is_numeric($ancho)){
    $area = $longitud * $ancho;
    echo "El area del rectangulo es: " . $area;
}else{
    echo "Introduce valores numericos (Si es decimal hazlo con punto)";
}

}