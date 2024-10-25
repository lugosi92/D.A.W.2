<?php
session_start();

$buscarErr = $filtroErr = $opErr = ""; // Variables para mensajes de error
$err = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          // Verificar si el campo de búsqueda está vacío
            if (empty($_POST['buscar'])) { "<span class = \"buscarErr\"> Por favor, introduce un texto para buscar.</span> ";
                $err = true;
            }

            // Verificar si se ha seleccionado un filtro de búsqueda
            if (empty($_POST['filtro'])) {
                $filtroErr = "<span class = \"buscarErr\">Por favor, selecciona un filtro para buscar.</span>";
                $err = true;
            }

            // Verificar si se ha seleccionado una opción de género
            if (empty($_POST['op'])) {
                $opErr = "<span class = \"buscarErr\">Por favor, selecciona un género.</span>";
                $err = true;
            }

        if(!$err){
        $_SESSION['buscar'] = $_POST['buscar'];
        $_SESSION['filtro'] = $_POST['filtro'];
        $_SESSION['op'] = $_POST['op'];

        header("Location: /CLASE/PHP/Tema4/Hoja_10/ejercicio_1_resuelto.php");
        /*
        $buscar = $_POST['buscar'];
        $busqueda = $_POST['filtro'];
        $genero = $_POST['op'];


        header("Location: C:\xampp\htdocs\CLASE\PHP\Tema4\Hoja_10\ejercicio_1_resuelto.php")*/
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
        .buscarErr{
            color: red;
        }
    </style>
    
</head>
<body>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">

    <h1>Formulario simple</h1>

    <h2><i>Busqueda de cacniones</i></h2>

    <fieldset>
        <div>
            <label for = "buscar"> Texto a buscar:  </label>
            <input type = "text" id = "buscar" name = "buscar">
            <?php echo $buscarErr; ?>
    

            <br>
            <label for = "filtro"> Buscar en: <label>

            <input type = "radio" name = "filtro" id = "titulo" value = "cancion">Titulos de cancion
            <input type = "radio" name = "filtro" id = "titulo" value = "album">Nombre de album
            <input type = "radio" name = "filtro" id = "titulo" value = "ambos">Titulos de cancion  
            <?php echo $filtroErr; ?>

            <br>
            
            <select id = "op" name = "op">
            <option> </option>
                <option value = "cancion">Todos </option>
                <option value = "Acustica">Acustica </option>
                <option value = "Banda">Banda sonora </option>
                <option value = "Blues">Blues </option>
                <option value = "Electronica">Electronica </option>
                <option value = "Folk">Folk </option>
                <option value = "Jazz">Jazz </option>
                <option value = "New">New Age </option>
                <option value = "Pop">Pop </option>
                <option value = "Rock">Rock </option>
            </select>
            <?php echo $opErr; ?>

            <br>
            <br>

            <input type = "submit" value = "buscar">
        </div>
    </fieldset>
</body>
</html>