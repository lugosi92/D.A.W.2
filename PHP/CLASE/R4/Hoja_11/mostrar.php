<?php
session_start();
if (!isset($_SESSION['titulo'], $_SESSION['texto'], $_SESSION['categoria'])) {
    echo "No hay datos para mostrar.";
    exit();
}

$titulo = $_SESSION['titulo'];
$texto = $_SESSION['texto'];
$categoria = $_SESSION['categoria'];
$imagen = $_SESSION['
'];



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soy gay</title>
</head>
<body>
    
    <p><strong>Titulo: </strong><?php echo htmlspecialchars($titulo);?></p>
    <p><strong>texto:</strong> <?php echo htmlspecialchars($texto);?></p>
    <p><strong>categoria: </strong><?php echo htmlspecialchars($categoria);?></p>
    <p><strong>Imagen: </strong><img src="<?php echo htmlspecialchars($imagen); ?>" alt="Imagen subida" width="200"></p>

</body>
</html>