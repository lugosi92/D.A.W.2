<?php
// Inicializar variables y mensajes de error
$titulo = $texto = $categoria = "";
$tituloError = $textoError = $categoriaError = $imagenError = "";
$isValid = true;
$categorias = ["promociones", "locales comerciales", "nueva construcción", "pisos", "naves industriales", "terrenos"];

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true; 

// Validar el campo Título
    $titulo = $_POST["titulo"] ?? ''; 

    if (empty($titulo)) {
        $tituloError = "El campo Título es obligatorio.";
        $isValid = false;
    } elseif (strlen($titulo) < 15 || strlen($titulo) > 25 || strtoupper($titulo) !== $titulo || !ctype_alpha($titulo)) {
        $tituloError = "El título debe estar en mayúsculas y contener entre 15 y 25 caracteres alfabéticos.";
        $isValid = false;
    }
}

// Validar el campo Texto
    if (empty($_POST["texto"])) {
        $textoError = "El campo Texto es obligatorio.";
        $isValid = false;
    } elseif (strlen($_POST["texto"]) < 50) {
        $textoError = "El texto debe contener al menos 50 caracteres.";
        $isValid = false;
    } else {
        $texto = $_POST["texto"];
}

// Validar la categoría (debe seleccionar al menos una categoría válida)
if (empty($_POST["categoria"]) || !in_array($_POST["categoria"], $categorias)) {
    $categoriaError = "Seleccione al menos una categoría válida.";
    $isValid = false;
} else {
    $categoria = $_POST["categoria"];
}

// Validar la(s) imagen(es)
if (empty($_FILES['imagen']['name'][0])) {
    $imagenError = "Debe subir al menos una imagen.";
    $isValid = false;
} else {
    $uploadDir = 'img/';
}


foreach ($_FILES['imagen']['name'] as $index => $fileName) {
        $fileTmp = $_FILES['imagen']['tmp_name'][$index];
        $fileDestination = $uploadDir . basename($fileName);
            
        if (!move_uploaded_file($fileTmp, $fileDestination)) {
        $imagenError = "Hubo un problema subiendo las imágenes.";
        $isValid = false;
        break;
        }
    }


// Mostrar resultados si todos los datos son válidos
    if ($isValid) {
        echo "<p>Noticia insertada con éxito:</p>";
        echo "<ul>";
        echo "<li><strong>Título:</strong> " . htmlspecialchars($titulo) . "</li>";
        echo "<li><strong>Texto:</strong> " . htmlspecialchars($texto) . "</li>";
        echo "<li><strong>Categorías:</strong> " . implode(", ", $categoria) . "</li>";
        echo "<li><strong>Imágenes subidas:</strong></li><ul>";
        
        foreach ($_FILES['imagen']['name'] as $fileName) {
            echo "<li>" . htmlspecialchars($fileName) . "</li>";
        }
            echo "</ul></ul>";
        }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Noticias</title>
    <style>
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        .form-group button {
            padding: 8px 12px;
            background-color: #ddd;
            border: 1px solid #aaa;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- TITULO -->
            <div class="form-group">
                <label for="titulo">Título: *</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <!-- TEXTO -->
            <div class="form-group">
                <label for="texto">Texto: *</label>
                <textarea id="texto" name="texto" required></textarea>
            </div>
            <!-- CATEGORIA -->
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria">
                    <option value="promociones">promociones</option>
                    <option value="eventos">eventos</option>
                    <option value="noticias">noticias</option>
                </select>
            </div>
            <!-- IMAGEN -->
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen">
            </div>
            <!-- ENVIAR -->
            <div class="form-group">
                <button type="submit">Insertar noticia</button>
            </div>
        </form>
    </div>
</body>
</html>
