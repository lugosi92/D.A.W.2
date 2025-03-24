<!-- GET -->
<form method="get" action="Procesar">
    Nombre: <input type="text" name="nombre" /><br />
    <input type="submit" value="Enviar" />
</form>

<?php
if (isset($_GET['nombre'])) {
    $nombre = htmlspecialchars($_GET['nombre']);
    echo "<h2>Nombre recibido:</h2>";
    echo "<p>$nombre</p>";
} else {
    echo "<p>No se ha enviado ningún nombre.</p>";
}
?>

<!-- POST -->
<form action="procesar.php" method="post">
    Nombre: <input type="text" name="nombre"><br>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'])) {
        $nombre = htmlspecialchars($_POST['nombre']);
        echo "<h2>Nombre recibido:</h2>";
        echo "<p>$nombre</p>";
    } else {
        echo "<p>No se ha enviado ningún nombre.</p>";
    }
}

?>

<!-- SESIONES + POST -->
<form action="procesar.php" method="post">
    Nombre: <input type="text" name="nombre"><br>
    <input type="submit" value="Enviar">
</form>

<?php 
session_start();

// Verificar si se ha enviado el formulario con POST
if (isset($_POST['nombre'])) {
    // Guardar el nombre en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
}

// Mostrar el nombre almacenado en la sesión
if (isset($_SESSION['nombre'])) {
    echo "Nombre almacenado en la sesión: " . $_SESSION['nombre'];
} else {
    echo "No se ha enviado ningún nombre.";
}
?>
