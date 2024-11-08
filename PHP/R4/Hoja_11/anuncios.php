<?php

/*
1. Validacion de campos (formatos correctos e inicializados)
    1.1 Validacion de datos segun reglas de negocio 
2. Manejo de Errores
3. Subida de fotos en /img
4. Mostrar resultados
*/
session_start();

// Inicializacion validazion
$titulo = $texto = $categoria = "";
$categoria = ["promociones", "locales comerciales", "nueva construcción", "pisos",
"naves industriales", "terrenos"];

// Inicializacion errores
$errTitulo = $errTexto = $errCategoria = $errImagenes = "";
$isValid = "true";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    //Validacion de datos

    // TITULO
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
    // TEXTO
        $texto = isset($_POST['texto']) ? $_POST['texto'] : "";
    // CATEGORIA
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : array(); 



}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>

    <h1>Subida de ficheros</h1>

    <h2>Insertar nueva noticia</h2>
    <style>
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
        }

        .form-group {
            margin-bottom: 15px;
        }

     

        input[type="text"],textarea,select {
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
                <!-- REPINTADO TITULO -->
                <input value = "<?php if(isset($titulo)) echo $titulo?>"
                type="text" id="titulo" name="titulo" required>
            </div>
            <!-- TEXTO -->
            <div class="form-group">
                <label for="texto">Texto: *</label>
                <!-- REPINTADO -->
                <textarea id="texto" name="texto" required>
                <?php if(isset($texto)) echo $texto?></textarea>
            </div>
            <!-- CATEGORIA -->
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria[]">
                    <option value="promociones" <?php if ($categoria == 'promociones') echo 'selected';?>>promociones</option>
                    <option value="locales" <?php if($categoria == 'locales') echo 'selected' ?>;>locales comerciales</option>
                    <option value="construccion">nueva construcción</option>
                    <option value="pisos">pisos</option>
                    <option value="naves">naves industriales</option>
                    <option value="terrenos">terrenos</option>
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
