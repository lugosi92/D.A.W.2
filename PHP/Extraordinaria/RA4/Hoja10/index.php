<!-- 
 1. Recibir datos y confirmar que no son nulos
 2. Value Repintado
 3. Errores 
  -->

<?php
session_start();


$nombre = $contraseña = $color = $publi = $año = "";
$ciudades = array();

$errNombre = "Debes introducir un nombre";
$errContraseña = "Debes introducir una contraseña";
$errColor = "Debes introducir un color";
$errPubli = "Debes seleconar recibir publicidad";
$errAño =  "Debes introducir un nombre";
$errCiudades = "Debes introducir la ciudad";

// Necesario para que no imprima nada al recargar la pagina
$nombreError = $contraseñaError = $colorError = $publiError = $añoError = $ciudadesError = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // TEXT
    if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre =  $_POST['nombre'];
    } else {
        $nombreError = $errNombre;
    }
  
    if (isset($_POST['contraseña']) && !empty($_POST['contraseña'])) {
        $contraseña = $_POST['contraseña'];
    } else {
        $contraseñaError = $errContraseña;
    }

    // RADIO
    if (isset($_POST['radio']) && !empty($_POST['radio'])) {
        $color = $_POST['radio'];
    } else {
        $colorError = $errColor;
    }

    // CHECKBOX
    if (isset($_POST['nombrePubli'])) {
        $publi = $_POST['nombrePubli'];
    } else {
        $publiError = $errPubli;
    }

    // SELECT SIMPLE
    if (isset($_POST["año"]) && !empty($_POST["año"])) {
        $año = $_POST["año"];
    } else {
        $añoError = $errAño;
    }

    // SELECT MULTIPLE
    if (isset($_POST['ciudad']) && !empty($_POST['ciudad'])) {
        $ciudades = $_POST['ciudad'];
    } else {
        $ciudadesError = $errCiudades;
    }


    // Mostrar resultados si no hay errores
    if (empty($nombreError) && empty($contraseñaError) && empty($colorError) && empty($publiError) && empty($añoError) && empty($ciudadesError)) {
        // Guardamos los datos en la sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['color'] = $color;
        $_SESSION['publi'] = $publi;
        $_SESSION['año'] = $año;
        $_SESSION['ciudades'] = $ciudades;

        // Redirigir a otra página para mostrar los resultados
        header('Location: resultados.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja10</title>
      <!-- IMPORTAR CSS -->
      <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Recibe parametros y repinta el formulario</h1>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <!-- CAMPOS DE TEXTO -->
    <div class = "login">
        <label>Nombre: </label><br>
        <input type="text" id="nombre" name="nombre" value = <?php  echo (isset($_POST['nombre'])) ? $nombre : "";?> ><br>
        <span style="color:red;"><?php echo $nombreError; ?></span> 

        <label>Contraseña :</label><br>
        <input type="text" id="contraseña" name="contraseña" value = <?php echo $contraseña?>><br>
        <span style="color:red;"><?php echo $contraseñaError; ?></span> 

    </div>
    
    <!-- RADIO -->
    <div class = "color">
        <label>Rojo: </label>
        <input type="radio" id="rojo" name="radio" value = "rojo" <?php echo ($color == "rojo") ? 'checked' : ""; ?>>

        <label>Naranja: </label>
        <input type="radio" id="naranja" name="radio" value = "naranja" <?php echo ($color == "naranja") ? 'checked' : ""; ?>>

        <label>Verde: </label>
        <input type="radio" id="verde" name="radio" value = "verde"<?php echo ($color == "verde") ? 'checked' : ""; ?>>
        <span style="color:red;"><?php echo $colorError; ?></span> 
    </div>

    <!-- CHECKBOX -->
    <div class = "publicidad">
        <label>Quiero recibir publicidad: </label>
        <input type="checkbox" id="publi" name = "nombrePubli" value = "publi" <?php echo ($publi == "publi") ? 'checked' : ""; ?>>
        <span style="color:red;"><?php echo $publiError ; ?></span> 
    </div>

    <!-- SELECT -->
     <div class = "opciones">

        <!-- SIMPLE -->
        <h3>Simple</h3>
            <label>Año de finalizacion de estudio: </label><br>
                <select id = "año" name = "año">
                    <option></option>
                    <option value = "2015" <?php echo ($año == "2015") ? 'selected' : "";?>>2015</option>
                    <option value = "2016" <?php echo ($año == "2016") ? 'selected' : "";?>>2016</option>
                    <option value = "2017" <?php echo ($año == "2017") ? 'selected' : "";?>>2017</option>
                    <option value = "2018" <?php echo ($año == "2018") ? 'selected' : "";?>>2018</option>
                </select><br>
                <span style="color:red;"><?php echo $añoError; ?></span> 

        <!-- MULTIPLE -->
        <h3>Multiple:</h3>
        <label>Ciudades: </label><br>
        <select id = "ciudad" name = "ciudad[]" multiple>
            <option value = "Gerona" <?php echo (in_array( "Gerona", $ciudades)) ? "selected" : ""; ?>>Gerona</option>
            <option value = "Madrid" <?php  echo (in_array( "Madrid", $ciudades)) ? "selected" : "";?>>Madrid</option>
            <option value = "Zaragoza" <?php  echo (in_array( "Zaragoza", $ciudades)) ? "selected" : "";?>>Zaragoza</option>
        </select>
        <span style="color:red;"><?php echo  $ciudadesError; ?></span> 
     </div>

     <label>Enviar datos: </label>
     <input type = "submit" ><br>
    
     <label>Ver Resultados: </label>
    <input type="submit" name="verResultados" value="Ver Resultados">

</form>

</body>
</html>