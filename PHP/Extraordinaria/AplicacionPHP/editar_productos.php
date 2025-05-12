<?php
require_once 'conexion.php';
require_once "cabeceraAdmin.php";


if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']['es_admin']) {

    header("Location: categorias.php");
    exit();
}

function obtener_producto($id) {
    global $bd;
    $sql = "SELECT * FROM productos WHERE codProducto = :id";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function actualizar_producto($id, $nombre, $precio, $descripcion, $peso, $stock, $codCategoria) {
    global $bd;
    $sql = "UPDATE productos 
            SET nombre = :nombre, precio = :precio, descripcion = :descripcion, 
                peso = :peso, stock = :stock, codCategoria = :codCategoria 
            WHERE codProducto = :id";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':codCategoria', $codCategoria);
    return $stmt->execute();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $peso = $_POST['peso'];
    $stock = $_POST['stock'];
    $codCategoria = $_POST['codCategoria'];
    actualizar_producto($id, $nombre, $precio, $descripcion, $peso, $stock, $codCategoria);

    header("Location: admin_productos.php");
    exit();
}

// Obtener el producto a editar
$id = $_GET['id'];
$producto = obtener_producto($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

  <form action="editar_productos.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $producto['codProducto']; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" required>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?php echo $producto['descripcion']; ?></textarea>

    <label for="peso">Peso:</label>
    <input type="number" step="0.01" name="peso" id="peso" value="<?php echo $producto['peso']; ?>" required>
    
    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" value="<?php echo $producto['stock']; ?>" required>

    <label for="codCategoria">ID Categoría:</label>
    <input type="number" name="codCategoria" id="codCategoria" value="<?php echo $producto['codCategoria']; ?>" required>


    <button type="submit">Actualizar Producto</button>
</form>

    
    <a href="admin_productos.php">Volver a la lista de productos</a>
</body>
</html>
