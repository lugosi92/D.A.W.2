<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";

// Asegurar que el usuario sea admin
if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {
    header("Location: categorias.php");
    exit();
}

// Funciones
function cargar_categorias() {
    global $bd;
    $stmt = $bd->query("SELECT * FROM categoria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertar_categoria($nombre, $descripcion) {
    global $bd;
    $stmt = $bd->prepare("INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descripcion)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->execute();
}

function eliminar_categoria($id) {
    global $bd;
    $stmt = $bd->prepare("DELETE FROM categoria WHERE codCategoria = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function cargar_categorias_con_conteo() {
    global $bd;
    $sql = "SELECT c.*, COUNT(p.codProducto) AS total_productos
            FROM categoria c
            LEFT JOIN productos p ON c.codCategoria = p.codCategoria
            GROUP BY c.codCategoria";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Acciones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        insertar_categoria($_POST['nombre'], $_POST['descripcion']);
    } elseif (isset($_POST['eliminar'])) {
        eliminar_categoria($_POST['id']);
    }
}

$categorias = cargar_categorias_con_conteo();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Categorías</title>
</head>
<body>
    <h1>Administrar Categorías</h1>

    <!-- Formulario para crear nueva categoría -->
    <h2>Crear Categoría</h2>
    <form action="admin_categorias.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required>
        <button type="submit" name="crear">Crear</button>
    </form>

    <!-- Tabla de categorías existentes -->
    <h2>Categorías Existentes</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
            <th>Total Productos</th>

        </tr>
        <?php foreach ($categorias as $cat): ?>
        <tr>
              <!-- Mostrar el ID -->
            <td><?php echo $cat['codCategoria']; ?></td>
            <td><?php echo htmlspecialchars($cat['nombre']); ?></td>
            <td><?php echo htmlspecialchars($cat['descripcion']); ?></td>
            <td><?php echo $cat['total_productos']; ?></td>

            <td>
                <!-- Eliminar -->
                <form action="admin_categorias.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $cat['codCategoria']; ?>">
                    <button type="submit" name="eliminar">Borrar</button>
                </form>

                <!-- Editar -->
                <form action="editar_categorias.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $cat['codCategoria']; ?>">
                    <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
