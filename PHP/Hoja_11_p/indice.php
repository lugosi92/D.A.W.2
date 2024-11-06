<?php
// Inicializar variables y mensajes de error
$titulo = $texto = $categoria = "";
$tituloError = $textoError = $categoriaError = $imagenError = "";
$isValid = true; // Variable que verifica si todos los campos son válidos
$categorias = ["promociones", "locales comerciales", "nueva construcción", "pisos", "naves industriales", "terrenos"]; // Categorías válidas

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true; // Reiniciar la validez

    // Validar el campo Título
    $titulo = $_POST["titulo"] ?? ''; // Obtener el título del formulario

    // Verificar si el campo Título está vacío o no cumple con las reglas
    if (empty($titulo)) {
        $tituloError = "El campo Título es obligatorio.";
        $isValid = false;
    } elseif (strlen($titulo) < 15 || strlen($titulo) > 25 || strtoupper($titulo) !== $titulo || !ctype_alpha($titulo)) {
        $tituloError = "El título debe estar en mayúsculas y contener entre 15 y 25 caracteres alfabéticos.";
        $isValid = false;
    }

    // Validar el campo Texto
    if (empty($_POST["texto"])) {
        $textoError = "El campo Texto es obligatorio.";
        $isValid = false;
    } elseif (strlen($_POST["texto"]) < 50) {
        $textoError = "El texto debe contener al menos 50 caracteres.";
        $isValid = false;
    } else {
        $texto = $_POST["texto"]; // Obtener el texto del formulario
    }

    // Validar la categoría
    if (empty($_POST["categoria"]) || !in_array($_POST["categoria"], $categorias)) {
        $categoriaError = "Seleccione al menos una categoría válida.";
        $isValid = false;
    } else {
        $categoria = $_POST["categoria"]; // Obtener la categoría seleccionada
    }

    // Validar la(s) imagen(es)
    if (empty($_FILES['imagen']['name'][0])) {
        $imagenError = "Debe subir al menos una imagen.";
        $isValid = false;
    } else {
        $uploadDir = 'img/'; // Directorio donde se guardarán las imágenes
    }

    // Subir las imágenes
    foreach ($_FILES['imagen']['name'] as $index => $fileName) {
        $fileTmp = $_FILES['imagen']['tmp_name'][$index]; // Ruta temporal del archivo
        $fileDestination = $uploadDir . basename($fileName); // Ruta de destino para la imagen

        // Mover el archivo subido al directorio de destino
        if (!move_uploaded_file($fileTmp, $fileDestination)) {
            $imagenError = "Hubo un problema subiendo las imágenes.";
            $isValid = false; // Cambia a no válido si hay un error
            break; // Sale del bucle en caso de error
        }
    }

    // Mostrar resultados si todos los datos son válidos
    if ($isValid) {
        echo "<p>Noticia insertada con éxito:</p>";
        echo "<ul>";
        echo "<li><strong>Título:</strong> " . htmlspecialchars($titulo) . "</li>";
        echo "<li><strong>Texto:</strong> " . htmlspecialchars($texto) . "</li>";
        echo "<li><strong>Categoría:</strong> " . htmlspecialchars($categoria) . "</li>"; // Mostrar solo una categoría
        echo "<li><strong>Imágenes subidas:</strong></li><ul>";

        // Mostrar nombres de las imágenes subidas
        foreach ($_FILES['imagen']['name'] as $fileName) {
            echo "<li>" . htmlspecialchars($fileName) . "</li>";
        }
        echo "</ul></ul>";
    }
}
?>
