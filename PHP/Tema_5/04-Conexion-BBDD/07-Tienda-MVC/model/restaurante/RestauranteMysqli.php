<?php
include '../../connection/mysqli.php';
include 'RestauranteObject.php';

class RestauranteMysqli
{
    private $conn;
    private $table = 'restaurantes';
    private $restaurante;

    public function __construct($restaurante = null)
    {
        $database = new DatabaseMySQLi();
        $this->conn = $database->connect();
        $this->restaurante = $restaurante;
    }

    public function getRestaurante()
    {
        return $this->restaurante;
    }

    public function setRestaurante($restaurante)
    {
        $this->restaurante = $restaurante;
    }

    public function getRestauranteByCredentenlials()
    {
        $correo = $this->restaurante->getCorreo();
        $clave = $this->restaurante->getClave();

        try {
            $query = "SELECT * FROM $this->table WHERE correo = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($registro = $resultado->fetch_assoc()) {
                $select_clave = $registro['clave'];

                if (password_verify($clave, $select_clave))
                    return $registro;
            }
        } catch (mysqli_sql_exception $e) {
            error_log($e->getMessage());
            return null;
        } catch (Exception $e) {
            print $e->getMessage();
            return null;
        }
    }


    public function insertRestaurante()
    {
        $correo = $this->restaurante->getCorreo();
        $clave = $this->restaurante->getClave();
        $pais = $this->restaurante->getPais();
        $cp = $this->restaurante->getCp(); // Entero
        $ciudad = $this->restaurante->getCiudad();
        $direccion = $this->restaurante->getDireccion();
        $password_encrypted = password_hash($clave, PASSWORD_DEFAULT);

        try {
            $query = "INSERT INTO $this->table
                    (correo, clave, pais, cp, ciudad, direccion) 
                    VALUES (?, ?, ?, ?, ?, ?);";

            $resultado = $this->conn->prepare($query);

            // Vincular los parámetros
            $resultado->bind_param('sssiss', $correo, $password_encrypted, $pais, $cp, $ciudad, $direccion);

            if ($resultado->execute()) {
                $lastId = $this->conn->insert_id;
                $this->restaurante->setId($lastId);
                return true;
            } else {
                return false;
            }

            return true;
        } catch (mysqli_sql_exception $e) {
            error_log("Error en la base de datos: " . $e->getMessage());
            return false;
        }
    }
}
