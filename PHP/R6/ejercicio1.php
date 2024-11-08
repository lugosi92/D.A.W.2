<?php

/*
1. Vincular base de datos
2. Alumnos
3. Notas
4. 

*/
$mysqli = new mysqli("localhost", "prueba1", "prueba1", "prueba1");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";


// ALUMNOS 
$query="SELECT * FROM alumno";

$resultado = $mysqli->query($query);
$numFilas = $resultado->num_rows;
echo "<p>El numero de filas en alumnos es: ", $numFilas, ".</p>";

// NOTAS
$query="SELECT * FROM notas";

$resultado = $mysqli->query($query);
$numFilas = $resultado->num_rows;
echo "<p>El numero de filas en notas es: ", $numFilas, ".</p>";

// Nombres que empeice pos A

$query="SELECT * FROM alumno WHERE Nombre LIKE 'A%'";

$resultado = $mysqli->query($query);

$numFilas = $resultado->num_rows;
echo "<p>Los nombres que empiecan por A son: ", $numFilas, ".</p>";

// Mostrar listado de alumnos como STRING (como antes es con A no aparecen todos)
$query = "SELECT * FROM clientes";

$numregistros=$resultado->$num_rows;
echo "<p>El número de alumnos es: ",$numregistros,".</p>";


while ($registro = $resultado->fetch_assoc()) {
    foreach ($registro as $campo)
        echo "Listado: ";
        echo $campo , "<br>";
}

$resultado->free();

// INSERT
// // $query = "INSERT INTO `alumno` (`codAlumno`, `Nombre`, `Direccion`, `Localidad`, `DNI`) VALUES
// // (3, 'Neil Molina', 'C/Pozuelo 10', 'Pozuelo', '33333333A')";
// $resultado = $mysqli->query($query);

// $query2 = "SELECT * FROM alumno";
// $resultado = $mysqli->query($query2);


// $numregistros = $resultado->num_rows;
// echo "<p>El número de alumnos después del INSERT es: ", $numregistros, ".</p>";

// echo "<p>Listado actualizado:</p>";
// while ($registro = $resultado->fetch_assoc()) {
//     foreach ($registro as $campo) {
//         echo $campo , "<br>";
//     }
// }

// $resultado->free();



// CREAR TABAL 
// $query = "CREATE TABLE `temporal4` (
//     dni int,
//     nombre varchar(30)
// )";

// $resultado = $mysqli->query($query);

// if ($resultado === TRUE) {
//     echo "<p>La tabla 'temporal4' se ha creado exitosamente.</p>";
// } else {
//     echo "<p>Error al crear la tabla 'temporal4': </p>";
// }




// BORRAR TABLA

        // Hacerlo luego


// Insertar mas rapido SENTENCIAS PREPARAS

// https://www.php.net/manual/es/mysqli.quickstart.prepared-statements.php
// https://diego.com.es/sentencias-preparadas-en-php


insertPreparadoAlumnos($mysqli, "Khaled", "Loranca", "Madrid", "49103646s");

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

$mysqli->close();
?>