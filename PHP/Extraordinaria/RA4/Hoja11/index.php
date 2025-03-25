<?php
$titulo =  $texto  = $imagenes = "";

$categoria = array();

$errTitulo = "Debes introducir un titulo";
$errTexto =  "Debes introducir un texto";
$errCategoria = "Debes introducir una categoria";
$errImagenes = "Debes introducir la imagen";

$estadoTitulo = $estadoTexto = $estadoCategroia = $estadoImagen = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){


    // TITULO
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $titulo = $_POST['titulo'];
    }else{
        $estadoTitulo = $errTitulo;
    }

    // TEXTO
    if(isset($_POST['texto']) && !empty($_POST['texto'])){
        $texto = $_POST['texto'];
    }else{
        $estadoTexto = $errTexto;
    }

    // CATEGORIA
    if(isset($_POST['categoria']) && !empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];
    }else{
        $estadoCategroia = $errCategoria;
    }

    // IMAGENES
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $tamaño = $_FILES['imagen']['size'];

        if ($tamaño > 256 * 1024) { // Máximo 256KB
            $estadoImagen = "La foto es demasiado grande";
        } else {
            $temporal = $_FILES['imagen']['tmp_name'];
            $destino = "img/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($temporal, $destino);
        }
    } else {
        $estadoImagen = $errImagenes;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja11</title>
      <!-- IMPORTAR CSS -->
      <link rel="stylesheet" href="index.css">
</head>

<body>
    

<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post"  enctype="multipart/form-data">

    <!-- CAMPOS DE TEXTO -->
    <label>Titulo: </label><br>
    <input type="text" name="titulo" value = <?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?> ><br>
    <span style="color:red;"> <?php echo $estadoTitulo;?> </span>

    
    <!-- CAMPO DE PARRAFO -->
    <label>Texto: </label>
    <textarea type="text" name="texto"><?php echo isset($_POST['texto']) ? $_POST['texto'] : '' ;?> </textarea><br>
    <span style="color:red;"> <?php echo $estadoTexto?></span>

    <!-- SELECT -->
    <label>Categoria: </label>
        <select name = "categoria[]">
            <option></option>
            <option value = "promociones" <?php echo (in_array( "promociones", $categoria)) ? "selected" : ""; ?>> Promociones</option>
            <option value = "tiempo" <?php echo (in_array( "tiempo", $categoria)) ? "selected" : ""; ?>>Tiempo </option>
            <option value = "economia" <?php echo (in_array( "economia", $categoria)) ? "selected" : ""; ?>>Economia </option>
        </select><br>
        <span style="color:red;"> <?php echo $estadoCategroia?></span>

    <!-- IMAGEN -->
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen"><br>

    <input type= "submit" value = "Insertar Noticia">

</form>

</body>
</html>