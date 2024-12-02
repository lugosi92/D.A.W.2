<?php
const MIN_CHAR_TEXTO = 50;
const MIN_CHAR_TITULO = 15;
const MAX_CHAR_TITULO = 25;

function validarTitulo($text)
{
    $errS = array();

    if (empty($text)) array_push($errS, "El texto está vacío");
    if (strlen($text) < MIN_CHAR_TITULO) array_push($errS, "El texto tiene menos de " . MIN_CHAR_TITULO . " caracteres");
    if (strlen($text) > MAX_CHAR_TITULO) array_push($errS, "El texto tiene más de" . MAX_CHAR_TITULO . " caracteres");

    $text = str_replace(' ', '', $text);

    if (!ctype_upper($text)) array_push($errS, "El texto no está en mayúsculas");
    if (!ctype_alpha($text)) array_push($errS, "El texto no es alfabético");

    return $errS;
}

function validarTexto($text)
{
    $errS = array();
    if (strlen($text) < MIN_CHAR_TEXTO)
        array_push($errS, "El texto tiene menos de" . MIN_CHAR_TEXTO . " caracteres");
    return $errS;
}

function subirArchivo($file_key, $dir)
{
    $validTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $files_paths = array();

    try {
        // Verificamos si existe el archivo y que no haya errores en la carga
        if (!isset($_FILES[$file_key]) || !is_array($_FILES[$file_key]['name'])) 
            throw new Exception("No se han recibido archivos o el formato es incorrecto.");

        $files = $_FILES[$file_key];
        $num_files = count($files['name']);

        echo "Número de archivos: " . $num_files . "<br>";

        for ($i = 0; $i < $num_files; $i++) {
            // Verificamos que haya un archivo subido antes de obtener su tipo
            if (!empty($files["tmp_name"][$i]) && $files["error"][$i] === UPLOAD_ERR_OK) {
                $fileType = mime_content_type($files["tmp_name"][$i]);

                if (!in_array($fileType, $validTypes))
                    throw new Exception("El archivo no es una imagen válida");

                $tam = $files["size"][$i];
                if ($tam > 256 * 1024)
                    throw new Exception("El archivo es demasiado grande");

                if (!is_dir($dir))
                    mkdir($dir, 0777, true); // Crear directorio si no existe

                $filepath = "$dir/" . basename($files["name"][$i]);
                if (!move_uploaded_file($files["tmp_name"][$i], $filepath))
                    throw new Exception("Error al mover el archivo");

                array_push($files_paths, $filepath);
            } else if ($files["error"][$i] !== UPLOAD_ERR_NO_FILE)
                // Si hay un error diferente a no haber subido archivo
                throw new Exception("Error en la carga del archivo: " . $files["error"][$i]);
        }

        if (!empty($files_paths)) 
            $_SESSION[$file_key] = $files_paths; // Guardar todos los archivos subidos

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function pintarErrores($arrayErr)
{
    if (!empty($arrayErr)):
?>
        <div class="errores">
            <?php foreach ($arrayErr as $err) echo "<span>$err</span>"; ?>
        </div>
<?php
    endif;
}
