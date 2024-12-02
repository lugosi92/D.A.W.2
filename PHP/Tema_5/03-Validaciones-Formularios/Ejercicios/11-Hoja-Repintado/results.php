<?php
include 'constants.php';
session_start();

$valor_titulo = $_GET[TITULO];
$valor_texto = $_GET[TEXTO];
$valor_categoria = $_GET[CATEGORIA];
$rutas_fichero = isset($_SESSION[IMAGE]) ? $_SESSION[IMAGE] : "No se subió ningún archivo.";

session_destroy()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario simple. Resultados</h1>
    <p>Estos son los resultados introducidos:</p>
    <ul>
        <li>Titulo: <?php echo $valor_titulo; ?></li>
        <li>Texto: <?php echo $valor_texto; ?></li>
        <li>Categoria: <?php echo $valor_categoria; ?></li>
        <li>
            <p>Imagen</p>
            <?php
            if (isset($_SESSION[IMAGE])):
                foreach ($rutas_fichero as $ruta):
            ?>
                    <img
                        src="<?php echo $ruta; ?>"
                        alt="fichero">
                <?php
                endforeach;
            else:
                ?>
                <p><?php echo $rutas_fichero; ?></p>
            <?php endif; ?>
        </li>
    </ul>
    <a href="index.php">Nueva busqueda</a>
</body>

</html>