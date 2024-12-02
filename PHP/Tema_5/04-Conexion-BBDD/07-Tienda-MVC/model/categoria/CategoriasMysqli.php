<?php
require_once __DIR__ . '../../../connection/mysqli.php';
include 'CategoriaObject.php';

class CategoriaMysqli
{
    private $conn;
    private $table = 'categorias';
    private $categoria;

    public function __construct($categoria = null)
    {
        $database = new DatabaseMySQLi();
        $this->conn = $database->connect();
        $this->categoria = $categoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function insertCategoria()
    {
        $nombre = $this->categoria->getNombre();
        $descripcion = $this->categoria->getDescripcion();

        try {
            $query = "INSERT INTO $this->table (Nombre, Descripcion) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ss', $nombre, $descripcion);

            if ($stmt->execute()) {
                $lastId = $this->conn->insert_id;
                $this->categoria->setId($lastId);
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            error_log("Error en la base de datos: " . $e->getMessage());
            return false;
        }
    }

    public function getCategorias()
    {
        try {
            $query = "SELECT * FROM $this->table";
            $resultado = $this->conn->query($query);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception $e) {
            error_log("Error al obtener las categorías: " . $e->getMessage());
            return null;
        }
    }

    public function getCategoriaById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE CodCat = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($registro = $resultado->fetch_assoc()) {
                $categoria = new CategoriaObject(
                    $registro['CodCat'],
                    $registro['Nombre'],
                    $registro['Descripcion']
                );
                return $categoria;
            }
            return null;
        } catch (mysqli_sql_exception $e) {
            error_log("Error al obtener la categoría: " . $e->getMessage());
            return null;
        }
    }

    public function deleteCategoria($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE CodCat = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);

            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al eliminar la categoría: " . $e->getMessage());
            return false;
        }
    }
}
