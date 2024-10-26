<?php

session_start();

$errBuscad = $errTipo = $errOp = "";


// es post el metodo que se ha usaod?
// buscador tipo op
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error = false    ;

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
        <input type = "texte" id = "buscador" name = "buscador"> 
        <span class = "error"><?php echo $errBuscad; ?></span>
        <br>

        <!-- Filtro -->
        <label for = "tipo">Buscar por: </label>
        <input type = "radio" id = "tipo" name = "tipo" value = "titulo">Titulo de cancion
        <input type = "radio" id = "tipo" name = "tipo" value = "nombre">Nombre de album
        <input type = "radio" id = "tipo" name = "tipo" value = "ambos">Ambos campos
        <span class = "error"><?php echo $errTipo?></span>

        <br>

        <!-- Genero -->
        <label for = "op">Genero musical: </label>
        <select type = "op" id = "op" name = "op"> 
            <option></option>
            <option value = "Todos">Todos</option>
            <option value = "Acustica">Acustica</option>
            <option value = "Banda sonora">Banda sonora</option>
            <option value = "Blues">Blues</option>
            <option value = "Electronica">Electronica</option>
            <option value = "Folk">Folk</option>
            <option value = "Jazz">Jazz</option>
            <option value = "New Age">New Age</option>
            <option value = "Pop">Pop</option>
            <option value = "Rock">Rock</option>
        </select>
        <span class = "error"><?php echo $errOp?></span>

        <br>

        <!-- Enviar -->
         <input type = "submit" value = "Buscar">
        </div>

    </fieldset>
    
</body>
</html>