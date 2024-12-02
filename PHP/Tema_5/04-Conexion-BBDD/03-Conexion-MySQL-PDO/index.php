<?php
include 'Alumno.php';

$user = 'prueba1';
$passwd = 'prueba1';
$dbname = 'prueba1';
$alumno = new Alumno('July', "C/Cabeza", "Jupiter", "55555555E");
try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh  = new PDO($dsn, $user, $passwd);
    selectAlumnosFetchAssoc($dbh);
    // insertPreparadoAlumnosConInterrogacion($dbh, "Pepe", "C/San Juan", "Pozuelo", "55555555E");
    // insertPreparadoAlumnosConDosPuntos($dbh, "Mercedes", "C/Hospital", "Majadahonda", "55555555E");
    // insertPreparadoAlumnosConArray($dbh, "Fernando", "C/Sagunto", "Madrid", "55555555E");
    // insertPreparadoAlumnosConObjeto($dbh, $alumno);
    // selectAlumnos($dbh);
} catch (PDOException  $e) {
    print "¡Error!: " . $e->getMessage() . "<br>";
}

function selectAlumnos($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<h1>Tabla alumnos</h1> <br>";
    foreach ($dbh->query("SELECT * FROM alumnos") as $fila) {
        echo print_r($fila) . "<br>";
    }
}

function selectAlumnosFetchAssoc($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM Alumnos");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();
    // Mostramos los resultados
    while ($row = $stmt->fetch()) {
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Direccion: {$row["direccion"]} <br><br>";
        echo "Localidad: {$row["localidad"]} <br><br>";
        echo "DNI: {$row["dni"]} <br><br>";
    }
}

function insertPreparadoAlumnosConInterrogacion($dbh, $nombre, $direccion, $localidad, $dni)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
              VALUES (?, ?, ?, ?);";
    $sentencia = $dbh->prepare($query);
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $direccion);
    $sentencia->bindParam(3, $localidad);
    $sentencia->bindParam(4, $dni);

    $sentencia->execute();
}

function insertPreparadoAlumnosConDosPuntos($dbh, $nombre, $direccion, $localidad, $dni)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
              VALUES (:nombre, :direccion, :localidad, :dni);";
    $sentencia = $dbh->prepare($query);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':localidad', $localidad);
    $sentencia->bindParam(':dni', $dni);

    $sentencia->execute();
}

function insertPreparadoAlumnosConArray($dbh, $nombre, $direccion, $localidad, $dni)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
                VALUES (:nombre, :direccion, :localidad, :dni);";


    $sentencia = $dbh->prepare($query);
    if ($sentencia->execute(array(':nombre' => $nombre, ':direccion' => $direccion, ':localidad' => $localidad, ':dni' => $dni)))
        echo 'Sentencia hecha';
}

function insertPreparadoAlumnosConObjeto($dbh, $alumno)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
    VALUES (:nombre, :direccion, :localidad, :dni);";


    $sentencia = $dbh->prepare($query);
    if ($sentencia->execute((array) $alumno))
        echo 'Sentencia hecha';
}
