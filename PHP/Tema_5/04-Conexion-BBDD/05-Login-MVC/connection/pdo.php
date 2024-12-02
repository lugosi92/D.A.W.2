<?php
include 'constants.php';
class DatabasePDO
{
    private $connection;
    private $host = 'localhost';
    private $username = USERNAME;
    private $password = PASSWORD;
    private $dbname = DBNAME;

    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para obtener la conexión
    public function getConnection()
    {
        return $this->connection;
    }

    // Puedes agregar métodos para otras operaciones si lo necesitas
}
