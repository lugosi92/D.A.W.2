<?php

    session_start();

    $buscar = $_SESSION['buscar'];
    $filtro = $_SESSION['filtro'];
    $op = $_SESSION['op'];


    echo "<p><strong> Texto busqueda </strong> $buscar </p>";
    echo "<p><strong> Buscar en:</strong> $filtro </p>";
    echo "<p><strong> Genero:</strong> $op </p>";