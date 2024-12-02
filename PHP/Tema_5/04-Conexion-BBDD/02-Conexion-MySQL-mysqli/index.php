<?php
$mysqli = new mysqli("localhost", "prueba1", "prueba1", "prueba1");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

selectTabla($mysqli, "alumnos", null);
insertPreparadoAlumnos($mysqli, "Ivan", "C/San Juan", "Madrid", "55555555E");

$mysqli->close();


function selectTabla($mysqli, $tabla, $condition)
{
    $query = $condition === null ?
        "SELECT * FROM $tabla"
        : "SELECT * FROM $tabla $condition";
    $resultado = $mysqli->query($query);

    echo "<h1>Tabla $tabla</h1>";
    while ($registro = $resultado->fetch_assoc()) {
        echo "<p>";
        foreach ($registro as $campo) {
            echo "$campo ";
        }
        echo "</p>";
    }
    $resultado->free();
}

function insertAlumnos($mysqli, $nombre, $direccion, $localidad, $dni)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
              VALUES ('$nombre', '$direccion', '$localidad', '$dni');";

    $resultado = $mysqli->query($query);
    if ($resultado) {
        echo "Registro insertado correctamente.<br>";
    } else {
        echo "Error al insertar: " . $mysqli->error . "<br>";
    }
    $resultado->free();
}

function deleteAlumnos($mysqli, $id)
{
    $query = "DELETE FROM alumnos WHERE codalumno = $id;";

    $resultado = $mysqli->query($query);
    if ($resultado) {
        echo "Registro eliminado correctamente.<br>";
    } else {
        echo "Error al eliminar: " . $mysqli->error . "<br>";
    }
    $resultado->free();
}

function createTable($mysqli, $name)
{
    $query = "CREATE TABLE IF NOT EXISTS $name (
        `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `asignatura` varchar(30) NOT NULL
      );";

    $resultado = $mysqli->query($query);
    if ($resultado) {
        echo "Tabla creada correctamente $name.<br>";
    } else {
        echo "Error al crear la tabla $name: " . $mysqli->error . "<br>";
    }
}

function deleteTable($mysqli, $name)
{
    $query = "DROP TABLE IF EXISTS $name";

    $resultado = $mysqli->query($query);
    if ($resultado) {
        echo "Tabla eliminada correctamente $name.<br>";
    } else {
        echo "Error al eliminar $name: " . $mysqli->error . "<br>";
    }
}

function insertPreparadoAlumnos($mysqli, $nombre, $direccion, $localidad, $dni)
{
    $query = "INSERT INTO alumnos (nombre, direccion, localidad, dni) 
              VALUES (?, ?, ?, ?);";

    $sentencia = $mysqli->prepare($query);
    
    if (!$sentencia) {
        echo "Error en la preparación de la consulta: " . $mysqli->error . "<br>";
        return;
    }

    // Cambiado a 'ssss' para indicar que todos los parámetros son strings
    
    $sentencia->bind_param('ssss', $nombre, $direccion, $localidad, $dni);

    if ($sentencia->execute()) {
        echo "Registro insertado correctamente.<br>";
    } else {
        echo "Error al insertar el registro: " . $sentencia->error . "<br>";
    }

    $sentencia->close();
}
