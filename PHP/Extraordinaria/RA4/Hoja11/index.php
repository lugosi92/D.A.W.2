<?php

session_start();

$titulo =  $texto  = $imagenes = "";

$categoria = array();

$errTitulo = "Debes introducir un titulo";
$errTexto =  "Debes introducir un texto";
$errCategoria = "Debes introducir una categoria";
$errImagenes = "Debes introducir la imagen";

$estadoTitulo = $estadoTexto = $estadoCategoria = $estadoImagen = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    // TITULO
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = $_POST['titulo']; 
        if (!preg_match('/^[A-Z\s]{15,25}$/', $titulo)) {
            $estadoTitulo = "Deben ser caracteres en mayusuclas entren 15-25"; 
        }
    } else {
        $estadoTitulo = $errTitulo;
    }

    // TEXTO
    if (isset($_POST['texto']) && !empty($_POST['texto'])) {
        $texto = $_POST['texto'];
        if (strlen($texto) < 50) {
            $estadoTexto = "Debe contener al menos 50 caracteres";
        }
    } else {
        $estadoTexto = $errTexto;
    }


    // CATEGORIA
    if($_POST['categoria'] !== "" || count($_POST['categoria']) > 0) {
        $categoria = $_POST['categoria'];
    }else{
        $estadoCategoria = $errCategoria;
    }

    // IMAGENES 'name' 'type' 'size' 'tmp_name' 'error'
    if (empty($_FILES['imagen']) || $_FILES['imagen']['error'] == 0) {
        
        $tamaño = $_FILES['imagen']['size'];

        if ($tamaño > 256 * 1024) { 
            $estadoImagen = "La foto es demasiado grande";
        } else {
            $temporal = $_FILES['imagen']['tmp_name'];
            $destino = "img/" . basename($_FILES['imagen']['name']);
            move_uploaded_file($temporal, $destino);
        }
    } else {
        $estadoImagen = $errImagenes;
    }

    if(empty($estadoTitulo) && empty($estadoTexto) && empty($estadoCategoria) && empty($estadoImagen)){

        $_SESSION['titulo'] = $titulo;
        $_SESSION['texto'] = $texto;
        $_SESSION['categoria'] = $categoria;
        $_SESSION['imagen'] = $destino;
    
        header('Location: mostrar.php');
        exit();
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
            <option value = "locales comerciales" <?php echo (in_array( "locales comerciales", $categoria)) ? "selected" : ""; ?>>Loclaes comerciales </option>
            <option value = "nueva construccion" <?php echo (in_array( "nueva construccion", $categoria)) ? "selected" : ""; ?>> Nueva Construccion</option>
            <option value = "pisos" <?php echo (in_array( "pisos", $categoria)) ? "selected" : ""; ?>>Pisos </option>
            <option value = "naves industriales" <?php echo (in_array( "naves industriales", $categoria)) ? "selected" : ""; ?>>Naves industrailes </option>
            <option value = "terrenos" <?php echo (in_array( "terrenos", $categoria)) ? "selected" : ""; ?>>Terrenos </option>
        </select><br>
        <span style="color:red;"> <?php echo $estadoCategoria?></span>

    <!-- IMAGEN -->
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen"><br>
    <span style="color:red;"> <?php echo $estadoImagen?></span>

    <input type= "submit" value = "Insertar Noticia">

</form>

</body>
</html>