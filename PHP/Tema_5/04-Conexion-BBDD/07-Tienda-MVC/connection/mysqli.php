<?php
include 'constants.php';
class DatabaseMySQLi
{
    private $connection;
    private $host = 'localhost';
    private $username = USERNAME;
    private $password = PASSWORD;
    private $dbname = DBNAME;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }

    public function connect()
    {
        return $this->connection;
    }

}
