<?php
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'prueba1';
$conn = new mysqli('localhost', USERNAME, PASSWORD, DBNAME);

insert($conn, "Neil", "12345");
insert($conn, "Khaled", "01234");
insert($conn, "Pepe", "11111");
insert($conn, "Luis", "2222");

function insert($conn, $nombre, $password)
{

    try {
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (usuario, password) 
              VALUES ('$nombre', '$password_encrypted');";
        echo $query . "<br>";
        echo 'Insert realizado <br>';
        return $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        print $e->getMessage();
    }
}
