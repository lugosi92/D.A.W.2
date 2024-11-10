<?php
/*
1. Action
2. HTML 
    2.1 Repitando 
    2.2 Error
3. PHP
    3.1 Sesion iniciada
    3.2 Validar que no se envia accidentalemnte
    3.3 IF, acierto error
*/

session_start();

$nombre = $contraseña = $radio = $check = $año = "";
$ciudades = array();

$errNombre = $errContraseña = $errRadio = $errCheck = $errAño = $errCiudades = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // NOMBRE Y CONTRASEÑA
    if (empty($_POST['nombre'])) {
        $errNombre = "Por favor, introduzca su nombre";
    } else {
        $nombre = $_POST['nombre'];
    }

    if (empty($_POST['contraseña'])) {
        $errContraseña = "Por favor, introduzca su contraseña";
    } else {
        $contraseña = $_POST['contraseña'];
    }

    // RADIO
    if (empty($_POST['radio'])) {
        $errRadio = "Por favor seleccione un color";
    } else {
        $radio = $_POST['radio'];
    }

    // CHECKBOX
    if (empty($_POST['check'])) {
        $errCheck = "Obligatorio recibir publicidad";
    } else {
        $check = $_POST['check'];
    }

    // SELECT SIMPLE
    if (empty($_POST['año'])) {
        $errAño = "Debe introducir un año";
    } else {
        $año = $_POST['año'];
    }

    // SELECT MÚLTIPLE
    if (empty($_POST['ciudades'])) {
        $errCiudades = "Por favor, seleccione al menos una ciudad";
    } else {
        $ciudades = $_POST['ciudades'];
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
        .error{
            color: red;
        }
    </style>
    
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
        <fieldset>
            <div class="inicio">
                <label for="nombre">Nombre:</label>
                <input value = "<?php if(isset($_POST['nombre'])) echo $nombre;?>"
                type="text" name = "nombre" id = "nombre">
                <!-- ERROR -->
                <span class = "error"><?php echo $errNombre ?></span>

                <label for="Contraseña">Contraseña:</label>
                <input value = "<?php if(isset($_POST['contraseña'])) echo $contraseña;?>"
                type="text" name = "contraseña" id = "contraseña">
                <!-- ERROR -->
                <span class = "error"><?php echo $errContraseña ?></span>
            </div>

            <br>

            <div class="radio">
                <label for="radio">Radio:</label><br>
                <input type="radio" name = "radio" id = "rojo" value= "rojo" <?php if($radio == "rojo") echo  'checked';?>>Rojo
                <input type="radio" name = "radio" id = "Naranja" value= "naranja" <?php if($radio == "naranja") echo 'checked';?>>Naranja
                <input type="radio" name = "radio" id = "verde" value="verde" <?php if($radio == "verde") echo 'checked';?>>Verde
                <span class="error"> <?php echo $errRadio?></span>
            </div>

            <br>

            <div class="check">
                <label for="check">ChekBox:</label><br>
                <input type="checkbox" name = "check" id = "check" <?php if(isset($_POST['check'])) echo 'checked';?>>Quiero recibir publicidad
            </div>

            <br>

            <div class="opciones">
                <label for="simple">Simple:</label><br>
                    <select name = "año" id = "año">
                        <option value = "2020" <?php if($año == 2020) echo 'selected';?>>2020</option>
                        <option value = "2021" <?php if($año == 2021) echo 'selected';?>>2021</option>
                        <option value = "2022" <?php if($año == 2022) echo 'selected';?>>2022</option>
                        <option value = "2023" <?php if($año == 2023) echo 'selected';?>>2023</option>
                        <option value = "2024" <?php if($año == 2024) echo 'selected';?>>2024</option>
                    </select>
                    <span class="error"> <?php echo $errAño?></span>

                    <br>

                <label for="Multiple">Multiple:</label><br>
                    <select name="ciudades[]" id="ciudades" multiple>
                        <option value = "Madrid" <?php if(in_array("Madrid", $ciudades)) echo 'selected';?>>Madrid: </option>
                        <option value = "Barcelona" <?php if(in_array("Barcelona", $ciudades)) echo 'selected';?>>Barcelona: </option>
                        <option value = "Valencia" <?php if(in_array("Valencia", $ciudades)) echo 'selected';?>>Valencia: </option>
                        <option value = "Cadiz" <?php if(in_array("Cadiz", $ciudades)) echo 'selected';?>>Cadiz: </option>
                        <option value = "Sevilla" <?php if(in_array("Sevilla", $ciudades)) echo 'selected';?>>Sevilla: </option>
                    </select>
                    <span class="error"> <?php echo $errCiudades?></span>
            </div>
        </fieldset>

        <input type="submit">
    </div>

    </form>
</body>

</html>