<?php
require_once __DIR__ . '../../../connection/mysqli.php';
require_once __DIR__ . '../categoria/CategoriasMysqli.php';  

class ProductoMysqli
{
    private $conn;
    private $table = 'productos';  // Nombre de la tabla de productos
    private $producto;

    public function __construct($producto = null)
    {
        $database = new DatabaseMySQLi();  // Asumiendo que DatabaseMySQLi está definida en mysqli.php
        $this->conn = $database->connect();
        $this->producto = $producto;
    }

    // Insertar producto
    public function insertProducto()
    {
        $nombre = $this->producto->getNombre();
        $descripcion = $this->producto->getDescripcion();
        $peso = $this->producto->getPeso();
        $stock = $this->producto->getStock();
        $categoria_id = $this->producto->getCategoria()->getId();

        try {
            $query = "INSERT INTO $this->table (nombre, descripcion, peso, stock, categoria_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ssdis', $nombre, $descripcion, $peso, $stock, $categoria_id);

            if ($stmt->execute()) {
                $lastId = $this->conn->insert_id;
                $this->producto->setId($lastId);
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            error_log("Error en la base de datos: " . $e->getMessage());
            return false;
        }
    }

    // Obtener todos los productos
    public function getProductos()
    {
        try {
            $query = "SELECT * FROM $this->table";
            $resultado = $this->conn->query($query);
            $productos = [];

            while ($registro = $resultado->fetch_assoc()) {
                // Suponiendo que tienes una clase CategoriaMysqli para manejar la categoría
                $categoria = new CategoriaMysqli();
                $categoria_obj = $categoria->getCategoriaById($registro['categoria']);

                $productos[] = new ProductoObject(
                    $registro['CodProd'],
                    $registro['nombre'],
                    $registro['descripcion'],
                    $registro['peso'],
                    $registro['stock'],
                    $categoria_obj  // Relación con la categoría
                );
            }

            return $productos;
        } catch (mysqli_sql_exception $e) {
            error_log("Error al obtener los productos: " . $e->getMessage());
            return null;
        }
    }

    // Obtener producto por ID
    public function getProductoById()
    {
        try {
            $query = "SELECT * FROM $this->table WHERE CodProd = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $this->producto->getId());
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($registro = $resultado->fetch_assoc()) {
                $categoria = new CategoriaMysqli();
                $categoria_obj = $categoria->getCategoriaById($registro['categoria']);
                return new ProductoObject(
                    $registro['CodProd'],
                    $registro['nombre'],
                    $registro['descripcion'],
                    $registro['peso'],
                    $registro['stock'],
                    $categoria_obj
                );
            }

            return null;
        } catch (mysqli_sql_exception $e) {
            error_log("Error al obtener el producto: " . $e->getMessage());
            return null;
        }
    }

    // Eliminar producto
    public function deleteProducto($id = null)
    {
        try {
            $query = "DELETE FROM $this->table WHERE CodProd = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);

            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al eliminar el producto: " . $e->getMessage());
            return false;
        }
    }

    // Obtener productos por ID de categoría
    public function getProductosByCategoriaId($categoria_id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE categoria = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $categoria_id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $productos = [];

            while ($registro = $resultado->fetch_assoc()) {
                // Suponiendo que tienes una clase CategoriaMysqli para manejar la categoría
                $categoria = new CategoriaMysqli();
                $categoria_obj = $categoria->getCategoriaById($registro['categoria']);
                $productos[] = new ProductoObject(
                    $registro['CodProd'],
                    $registro['nombre'],
                    $registro['descripcion'],
                    $registro['peso'],
                    $registro['stock'],
                    $categoria_obj  // Relación con la categoría
                );
            }

            return $productos;
        } catch (mysqli_sql_exception $e) {
            error_log("Error al obtener los productos por categoría: " . $e->getMessage());
            return null;
        }
    }

    // Actualizar producto
    public function updateProducto()
    {

        $id = $this->producto->getId();
        $nombre = $this->producto->getNombre();
        $descripcion = $this->producto->getDescripcion();
        $peso = $this->producto->getPeso();
        $stock = $this->producto->getStock();
        $categoria_id = $this->producto->getCategoria()->getId();

        try {
            $query = "UPDATE $this->table 
                          SET nombre = ?, descripcion = ?, peso = ?, stock = ?, categoria = ? 
                          WHERE CodProd = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ssdisi', $nombre, $descripcion, $peso, $stock, $categoria_id, $id);

            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al actualizar el producto: " . $e->getMessage());
            return false;
        }
    }
}
