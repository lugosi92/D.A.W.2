<?php
session_start();
require_once 'conexion.php';


if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {
    // Redirigir si no es administrador
    header("Location: categorias.php");
    exit();
}

// Función para cargar todos los productos
function cargar_productos() {
    global $bd;
    $sql = "SELECT * FROM productos";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para crear un nuevo producto
function crear_producto($nombre, $precio, $descripcion) {
    global $bd;
    $sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES (:nombre, :precio, :descripcion)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    return $stmt->execute();
}

// Función para actualizar un producto
function actualizar_producto($id, $nombre, $precio, $descripcion) {
    global $bd;
    $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion WHERE codProducto = :id";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    return $stmt->execute();
}

// Función para eliminar un producto
function eliminar_producto($id) {
    global $bd;
    $sql = "DELETE FROM productos WHERE codProducto = :id";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

// Control de acciones
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear'])) {
        // Crear producto
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        crear_producto($nombre, $precio, $descripcion);
    }

    if (isset($_POST['editar'])) {
        // Editar producto
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        actualizar_producto($id, $nombre, $precio, $descripcion);
    }

    if (isset($_POST['eliminar'])) {
        // Eliminar producto
        $id = $_POST['id'];
        eliminar_producto($id);
    }
}

$productos = cargar_productos(); // Cargar los productos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Administrar Productos</h1>
    
    <!-- Formulario para crear un nuevo producto -->
    <h2>Crear Producto</h2>
    <form action="admin_productos.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <button type="submit" name="crear">Crear Producto</button>
    </form>

    <!-- Tabla de productos existentes -->
    <h2>Lista de Productos</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td>
                <!-- Formulario para editar -->
                <form action="admin_productos.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto['codProducto']; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
                <form action="admin_productos.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto['codProducto']; ?>">
                    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
                    <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
                    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
                    <button type="submit" name="editar">Editar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
