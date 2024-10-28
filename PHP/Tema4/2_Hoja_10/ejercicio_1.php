<?php

session_start();

$errBuscad = $errTipo = $errOp = $buscador = $tipoSeleccionado = $opcion = "";


// es post el metodo que se ha usaod?
// buscador tipo op
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error = false;
    $buscador =  isset($_POST['buscador'])  ? $_POST['buscador'] : ""; //Para guardar lo correcto
    $tipoSeleccionado = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $opcion =  isset($_POST['op'])  ?  $_POST['op'] : "";

    if(empty($_POST["buscador"])){
        $errBuscad ="Texto a buscar, no puede estar vacio";
        $error = true;
    }

    if(empty($_POST["tipo"])){
        $errTipo ="Buscar por, no puede estar vacio";
        $error = true;
    }

    if(empty($_POST["op"])){
        $errOp =  "Genero musical, no puede estar vacio";
        $error = true;
    }

    // guardar la sesion
    if(!$error){
        $_SESSION['buscador'] = $_POST['buscador'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['op'] = $_POST['op'];
        header("Location: /CLASE/PHP/Tema4/2_Hoja_10/ejercicio1resuelto.php");
        exit();
    }


}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1, legend {
            text-align:center;
        }
        .error{
            color: red;
        }
        
    </style>
</head>


<body>

    <form  action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST"> 

    <h1>Busqueda de canciones</h1>

    <fieldset>
        <legend>Rellene el codigo porfavor</legend>

        <div class = "partOne">
        <!-- Buscar -->
        <label for= "buscador">Texto a buscar: </label>  
         <input value="<?php if(isset($buscador)) echo $buscador; ?>" 
                type = "texte" id = "buscador" name = "buscador"> 

        <span class = "error"><?php echo $errBuscad; ?></span>
        <br>

        <!-- Filtro -->
        <label for = "tipo">Buscar por: </label>
        <input type = "radio" id = "tipo" name = "tipo" value = "titulo"<?php if ($tipoSeleccionado== 'titulo') echo 'checked'; ?>>Titulo de cancion
        <input type = "radio" id = "tipo" name = "tipo" value = "nombre"<?php if ($tipoSeleccionado== 'nombre') echo 'checked'; ?>>Nombre de album
        <input type = "radio" id = "tipo" name = "tipo" value = "ambos" <?php if ($tipoSeleccionado== 'ambos') echo 'checked'; ?>>Ambos campos
        <span class = "error"><?php echo $errTipo?></span>

        <br>

        <!-- Genero -->
        <label for = "op">Genero musical: </label>
        <select type = "op" id = "op" name = "op"> 
            <option></option>
            <option value = "Todos" <?php if ($opcion == "Todos") echo "selected"  ?>>Todos</option>
            <option value = "Acustica" <?php if ($opcion == "Acustica") echo "selected"  ?>>Acustica</option>
            <option value = "Banda" <?php if ($opcion == "Banda") echo "selected"  ?>>Banda sonora</option>
            <option value = "Blues" <?php if ($opcion == "Blues") echo "selected"  ?>>Blues</option>
            <option value = "Electronica" <?php if ($opcion == "Electronica") echo "selected"  ?>>Electronica</option>
            <option value = "Folk" <?php if ($opcion == "Folk") echo "selected"  ?>>Folk</option>
            <option value = "Jazz"<?php if ($opcion == "Jazz") echo "selected"  ?>>Jazz</option>
            <option value = "New" <?php if ($opcion == "New") echo "selected"  ?>>New Age</option>
            <option value = "Pop" <?php if ($opcion == "Pop") echo "selected"  ?>>Pop</option>
            <option value = "Rock" <?php if ($opcion == "Rock") echo "selected"  ?>>Rock</option>
        </select>
        <span class = "error"><?php echo $errOp?></span>

        <br>

        <!-- Enviar -->
         <input type = "submit" value = "Buscar">
        </div>

    </fieldset>
    
</body>
</html>