 <!-- Formulario para subir archivos -->
 <form action="subir.php" method="post" enctype="multipart/form-data">
        Selecciona un archivo: 
        <input type="file" name="fichero">
        <br><br>
        <input type="submit" value="Subir Archivo">
    </form>

<?php
// Verifica si se ha enviado un archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fichero"])) {
    
    // Obtener el tamaño del archivo
    $tam = $_FILES["fichero"]["size"];

    // Limitar el tamaño del archivo a 256 KB
    if ($tam > 256 * 1024) {
        echo "<br>Error: El archivo es demasiado grande.";
        return;
    }

    // Mostrar información del archivo
    echo "Nombre del fichero: " . $_FILES["fichero"]["name"];
    echo "<br>Nombre temporal en el servidor: " . $_FILES["fichero"]["tmp_name"];

    // Definir la carpeta de destino
    $carpeta_destino = "subidos/";

    // Asegurar que la carpeta existe
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true); // Crear la carpeta si no existe
    }

    // Mover el archivo a la carpeta 'subidos'
    $ruta_final = $carpeta_destino . basename($_FILES["fichero"]["name"]);
    $res = move_uploaded_file($_FILES["fichero"]["tmp_name"], $ruta_final);

    // Mensaje de éxito o error
    if ($res) {
        echo "<br>Fichero guardado correctamente en: " . $ruta_final;
    } else {
        echo "<br>Error al guardar el fichero.";
    }
} else {
    echo "<br>No se ha enviado ningún archivo.";
}
?>
