<?php
include '../controller/Categoria.php';
session_start();
include 'header.php';

if (!isset($_SESSION['user'])) {
    header('Location: auth/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: auth/login.php");
        exit;
    }
}

$categoria = new CategoriaController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de categorías</h1>
    <?php
    $categorias = $categoria->showCategorias();
    if (!$categorias) {
        echo "<p>No hay categorias</p>";
    } else {
        echo "<ul>"; //abrir la lista
        foreach ($categorias as $cat) {
            $url = "productos.php?categoria=" . $cat['CodCat'];
            echo "<li><a href='$url'>" . $cat['Nombre'] . "</a></li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>