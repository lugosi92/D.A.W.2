<?php

$nombre;
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    echo $nombre;
}