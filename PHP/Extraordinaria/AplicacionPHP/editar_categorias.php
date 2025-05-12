<?php
require_once 'conexion.php';
require_once 'cabeceraAdmin.php';

// Asegurar que el usuario sea admin
if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit();
}

// Obtener categoría por ID
function obtener_categoria($id) {
    global $bd;
    $stmt = $bd->prepare("SELECT * FROM categoria WHERE codCategoria = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Actualizar categoría
function actualizar_categoria($id_original, $nuevo_id, $nombre, $descripcion) {
    global $bd;
    $stmt = $bd->prepare("UPDATE categoria SET codCategoria = :nuevo_id, nombre = :nombre, descripcion = :descripcion WHERE codCategoria = :id_original");
    $stmt->bindParam(':nuevo_id', $nuevo_id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':id_original', $id_original);
    $stmt->execute();
}


// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $id_original = $_POST['id_original'];
    $nuevo_id = $_POST['codCategoria'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    actualizar_categoria($id_original, $nuevo_id, $nombre, $descripcion);
    header("Location: admin_categorias.php");
    exit();
}


// Mostrar los datos actuales de la categoría
if (!isset($_GET['id'])) {
    header("Location: admin_categorias.php");
    exit();
}

$categoria = obtener_categoria($_GET['id']);
if (!$categoria) {
    echo "Categoría no encontrada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>

    <form action="editar_categorias.php" method="POST">
    <!-- ID original oculto -->
    <input type="hidden" name="id_original" value="<?php echo htmlspecialchars($categoria['codCategoria']); ?>">

    <label for="codCategoria">ID:</label>
    <input type="text" name="codCategoria" value="<?php echo htmlspecialchars($categoria['codCategoria']); ?>" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($categoria['nombre']); ?>" required>

    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" value="<?php echo htmlspecialchars($categoria['descripcion']); ?>" required>

    <button type="submit" name="actualizar">Guardar cambios</button>
    <a href="admin_categorias.php">Cancelar</a>
</form>

</body>
</html>
