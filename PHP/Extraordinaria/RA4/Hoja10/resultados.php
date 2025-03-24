<?php
// Iniciar la sesión para acceder a los datos almacenados
session_start();

// Comprobar si los datos existen en la sesión
if (isset($_SESSION['nombre'])) {
    // Mostrar los datos almacenados en la sesión
    echo "<h2>Resultados del formulario:</h2>";
    echo "Nombre: " . htmlspecialchars($_SESSION['nombre']) . "<br>";
    echo "Contraseña: " . htmlspecialchars($_SESSION['contraseña']) . "<br>";
    echo "Color seleccionado: " . htmlspecialchars($_SESSION['color']) . "<br>";
    echo "Publicidad: " . ($_SESSION['publi'] ? "Sí" : "No") . "<br>";
    echo "Año de finalización de estudio: " . htmlspecialchars($_SESSION['año']) . "<br>";
    echo "Ciudades seleccionadas: " . implode(", ", $_SESSION['ciudades']) . "<br>";
} else {
    // Si no hay datos en la sesión, mostrar un mensaje de error
    echo "No se han recibido datos del formulario.";
}

// Limpiar la sesión después de mostrar los resultados
session_unset();
session_destroy();
?>
