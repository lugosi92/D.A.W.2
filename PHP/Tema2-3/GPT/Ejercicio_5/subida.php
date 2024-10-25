<?php
//1. Validar informacion con servidor
//2. ruta temporal
//3. Nombre del archivo
//4. ruta destino
//5. Guardar move_uploaded_file(rutatemporal, rutaDestino)

if(isset($_FILES["subida"])){

    if ($_FILES["subida"]["error"] === UPLOAD_ERR_OK) {

    $rutaTemporal = $_FILES["subida"]["tmp_name"];

    $nombreArchivo = $_FILES["subida"]["name"];

    $rutaDestino = "subidas/" . $nombreArchivo;

    if(move_uploaded_file($rutaTemporal, $rutaDestino)){
        echo "Archvio subido con exito";
    }else{
        echo "Error";
    }
} else {
    echo "Hubo un problema al subir el archivo.";
}
} else {
echo "No se ha seleccionado ningún archivo.";
}
?>







