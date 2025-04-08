<?php

session_start();

$id = $nombre = $titulo =  $texto  = $imagenes = "";

$categorias = array();

$errId = "Id incorrecto";
$errNombre = "Nombre incorrecto";
$errTitulo = "Debes introducir un titulo";
$errTexto =  "Debes introducir un texto";
$errCategoria = "Debes introducir una categoria";
$errImagenes = "Debes introducir la imagen";

$estadoId = $estadoNombre = $estadoTitulo = $estadoTexto = $estadoCategoria = $estadoImagen = "";

$host = "localhost";
$dbname = 'noticias2';
$usuario = 'root';
$clave = '';

$estadoConexion = "";

// CONEXION
try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
    $estadoConexion = "Conexion realizada con exito";

} catch(PDOException $e){
    $estadoConexion = "Error de conexion: ". $e->getMessage();
}

// LOGICA
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ID
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id= $_POST['id']; 
        if (!preg_match('/^[1-9]$/', $id)) {
            $estadoId = "ID incorrecto"; 
        }
    } else {
        $estadoId = $errId;
    }

    // NOMBRE
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        if (!preg_match('/^[A-Za-z0-9 ]*$/', $nombre)) {
            $estadoNombre = "Deben ser su nombre"; 
        }
    } else {
        $estadoNombre = $errNombre;
    }
    // TITULO
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = $_POST['titulo']; 
        if (!preg_match('/^[A-Za-z ]*$/', $titulo)) {
            $estadoTitulo = "Deben ser caracteres en mayusuclas entren 15-25"; 
        }
    } else {
        $estadoTitulo = $errTitulo;
    }

    // TEXTO
    //   Las contrucciones en la zona sur han aumentado drasticamente, la economia mejora. .
    if (isset($_POST['texto']) && !empty($_POST['texto'])) {
        $texto = $_POST['texto'];
        if (strlen($texto) < 50) {
            $estadoTexto = "Debe contener al menos 50 caracteres";
        }
    } else {
        $estadoTexto = $errTexto;
    }


    // CATEGORIA
    if(isset($_POST['categoria']) && !empty($_POST['categoria'])) {
        $categorias = $_POST['categoria'];
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
        try{

            // INSERTAR EN PUBLICACION
            $publicacion = $bd->prepare("INSERT INTO publicaciones(nombre, titulo, texto,imagen, cliente_id ) VALUES (:nombre, :titulo, :texto, :imagen, :id)");
            $publicacion->execute([
                ':nombre' => $nombre,
                ':titulo' => $titulo,
                ':texto' => $texto,
                ':imagen' => $destino,
                ':cliente_id' => $id
            ]);
            $publicacion_id = $bd->lastInsertId();

            foreach ($categorias as $categoria) {

                // INSERTAR EN CATGEORIA
                $categoria = $bd->prepare("INSERT INTO categorias (nombre) VALUES (:categoria)");
                $categoria->execute([
                    ':categoria' => $categoria
                ]);
                $categoria_id = $bd->lastInsertId();

                // INSERTAR EN CATEGOIRA_PUBLICACION
                $categoira_publicacion = $bd->prepare("INSERT INTO publicaciones_categorias (publicacion_id, categoria_id) VALUES (:publicacion_id, :categoria_id)");
                $categoira_publicacion->execute([
                    ':publicacion_id' => $publicacion_id,
                    ':categoria_id' => $categoria_id
                ]);
            }

            echo "Noticias insertadas con exito";
        
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['titulo'] = $titulo;
        $_SESSION['texto'] = $texto;
        $_SESSION['categoria'] = $categorias;
        $_SESSION['imagen'] = $destino;
    
        header('Location: mostrar.php');
        exit();

    }catch(PDOException $e){
        echo "Error al insertar: " . $e->getMessage();
    }
    
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

    <span> <?php echo $estadoConexion;?> </span>


    <!-- CAMPOS DE TEXTO -->
    <label>ID: </label><br>
    <input type="text" name="id" value = <?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?> ><br>
    <span style="color:red;"> <?php echo $estadoId;?> </span>


    <!-- CAMPOS DE TEXTO -->
    <label>Nombre: </label><br>
    <input type="text" name="nombre" value = <?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?> ><br>
    <span style="color:red;"> <?php echo $estadoNombre;?> </span>


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
        <select name = "categoria[]" multiple>
            <option></option>
            <option value = "promociones" <?php echo (in_array( "promociones", $categorias)) ? "selected" : ""; ?>> Promociones</option>
            <option value = "locales comerciales" <?php echo (in_array( "locales comerciales", $categorias)) ? "selected" : ""; ?>>Locales comerciales </option>
            <option value = "nueva construccion" <?php echo (in_array( "nueva construccion", $categorias)) ? "selected" : ""; ?>> Nueva Construccion</option>
            <option value = "pisos" <?php echo (in_array( "pisos", $categorias)) ? "selected" : ""; ?>>Pisos </option>
            <option value = "naves industriales" <?php echo (in_array( "naves industriales", $categorias)) ? "selected" : ""; ?>>Naves industrailes </option>
            <option value = "terrenos" <?php echo (in_array( "terrenos", $categorias)) ? "selected" : ""; ?>>Terrenos </option>
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