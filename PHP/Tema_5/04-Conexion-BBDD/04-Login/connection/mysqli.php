<?php
class DatabaseMySQLi
{
    private $connection;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'prueba1';

    // Constructor para inicializar la conexión cada vez que se crea un objeto
    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // Verificar la conexión
        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }

    // Método para obtener la conexión
    public function getConnection()
    {
        return $this->connection;
    }

    // Puedes agregar métodos para otras operaciones si lo necesitas
}
