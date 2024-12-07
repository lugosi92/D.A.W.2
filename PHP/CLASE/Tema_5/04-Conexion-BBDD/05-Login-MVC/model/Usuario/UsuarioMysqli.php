<?php
include '../../connection/mysqli.php';
include 'UsuarioObject.php';

class UsuarioMysqli
{
    private $conn;
    private $table = 'Usuarios';
    private $usuario;

    public function __construct($usuario = null)
    {
        $database = new DatabaseMySQLi();
        $this->conn = $database->connect();
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUserByCredentials()
    {
        $valor_usuario = $this->usuario->getUsuario();
        $valor_password = $this->usuario->getPassword();

        try {
            $query = "SELECT * FROM $this->table WHERE usuario = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $valor_usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($registro = $resultado->fetch_assoc()) {
                $select_password = $registro['password']; 
           
                if (password_verify($valor_password, $select_password)) {
                    return $registro;
                } else {
                    throw new Exception("No existe usuario con esa contraseña.");
                }
            } else {
                throw new Exception("No se encontró el usuario.");
            }
        } catch (mysqli_sql_exception $e) {
            error_log($e->getMessage()); 
            return null;
        } catch (Exception $e) {
            print $e->getMessage();
            return null;
        }
    }


    public function insertUser()
    {
        $nombre_usuario = $this->usuario->getUsuario();
        $password_usuario = $this->usuario->getPassword();
        $password_encrypted = password_hash($password_usuario, PASSWORD_DEFAULT);
        try {
            $query = "INSERT INTO $this->table (usuario, password, rol) 
              VALUES (?, ?, ?);";

            $resultado = $this->conn->prepare($query);
            $resultado->bind_param('ssi', $nombre_usuario, $password_encrypted, 0);

            if ($resultado->execute()) {
                $lastId = $this->conn->insert_id;
                $this->usuario->setId($lastId);
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            $e->getMessage();
            return false;
        }
    }
}
