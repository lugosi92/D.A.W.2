<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {
    // Redirigir si no es administrador
    header("Location: categorias.php");
    exit();
}

function insertar_producto($nombre, $precio, $descripcion, $codCategoria) {
    global $bd;

    $sql = "INSERT INTO productos (nombre, precio, descripcion, codCategoria) 
            VALUES (:nombre, :precio, :descripcion, :codCategoria)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':codCategoria', $codCategoria);
    return $stmt->execute();
}


function cargar_productos() {
    global $bd;
    $sql = "SELECT * FROM productos";
    $stmt = $bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function eliminar_producto($id) {
    global $bd;
    $sql = "DELETE FROM productos WHERE codProducto = :id";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['eliminar'])) {
        // Eliminar producto
        $id = $_POST['id'];
        eliminar_producto($id);
    } elseif (isset($_POST['crear'])) {
        // Crear producto
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $codCategoria = $_POST['codCategoria'];
        insertar_producto($nombre, $precio, $descripcion, $codCategoria);

    }
}

$productos = cargar_productos(); 
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

        <label for="codCategoria">ID Categoría:</label>
        <input type="number" name="codCategoria" id="codCategoria" required>

        <button type="submit" name="crear">Crear Producto</button>
    </form>

    <!-- Tabla de productos existentes -->
    <h2>Lista de Productos</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Peso</th>
            <th>ID Categoría</th>
            <th>Acciones</th>
             
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><?php echo $producto['stock']; ?></td>
            <td><?php echo $producto['peso']; ?></td>
            <td><?php echo $producto['codCategoria']; ?></td>
            <td>
                <!-- Formulario para eliminar producto -->
                <form action="admin_productos.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $producto['codProducto']; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>

                <!-- Redirigir al formulario de edición -->
                <form action="editar_productos.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $producto['codProducto']; ?>">
                    <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    
    <p><a href="panel.php">Volver al panel</a></p>
</body>
</html>
