<?php

session_start();

$buscar = $_SESSION['buscador'];
$filtro = $_SESSION['tipo'];
$op = $_SESSION['op'];


echo "<p><strong> Texto busqueda </strong> $buscar </p>";
echo "<p><strong> Buscar en:</strong> $filtro </p>";
echo "<p><strong> Genero:</strong> $op </p>";