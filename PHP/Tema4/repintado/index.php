<?php
session_start();

$nombre = $contraseña =$tipo = $año =  $ciudad = "";
$check = array(); 
$check2 = array(); 
$errNom = $errCont = $errTipo = $errCheck = $errAnio = $errCiudades = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Para guardar los valores e inicializar 

        // INICIO DE SESION
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : "";

        //RADIO
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";

        //CHECKBOX
        $check = isset($_POST['check']) ? $_POST['check'] : array();
        $check2 = isset($_POST['check2']) ? $_POST['check2'] : array();

        //SELECT
        $año = isset($_POST['año']) ? $_POST['año'] : "";
        $ciudad =isset($_POST['ciudad']) ? $_POST['ciudad'] : "";


    //Manejo de errores

        // INICIO DE SESION
        if(empty($_POST['nombre'])){ 
            $errNom= "Por favor, introduce un nombre";
        }
        if(empty($_POST['contraseña'])){
            $errCont = "Contraseña incorrecta";
        }

        //RADIO
        if(empty($_POST['tipo'])){
            $errTipo = "Introduce un tipo";
        }

        //CHECKBOX
        if(count($check) <= 0){
            $errCheck = "Recibir la publicidad";
        }
        if(count($check2) <= 0){
            $errCheck2 = "Recibir la publicidad";
        }

        //SELECT
        if(empty($_POST['año'])){
            $errAnio = "Introduzca el año";
        }

        if(empty($_POST['ciudad'])){
            $errCiudades = "Selecciona la/s ciudad/es";
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
        .inicio{
            text-align: center;
            width: 0;
            margin: 0 auto;
        }
        .error{
            color: red;
        }
    </style>
</head>


<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h1>HOLIS</h1>

    <!-- CAMPOS DE TREXTO -->
    <fieldset class = "inicio">

        <legend>INICIO DE SESION</legend>
            <label for = "nombre">Nombre<br>

                <!-- REPINTADO NOMBRE -->
                <input value = "<?php if(isset($nombre)) echo $nombre; ?>" 
                type = "text" id = "nombre" name = "nombre">
                
                <!-- ERROR NOMBRE -->
                <span class = "error"><?php echo $errNom?></span>  
                <br>
                <label for = "contraseña">Contraseña<br>


                <!-- REPINTADO CONTRASEÑA -->
                <input value = "<?php if(isset($contraseña)) echo $contraseña; ?>"  
                type = "text" id = "contraseña" name = "contraseña">

                <!-- ERROR CONTRASEÑA -->
                <span class = "error"><?php echo $errCont?></span>
    </fieldset>

    <br>
    <!-- RADIO -->
    <fieldset class = "radio">
        <legend>RADIO</legend>

            <input type= "radio" name = "tipo" value = "rojo" <?php if ($tipo == 'rojo') echo 'checked'; ?>>  Rojo
            <input type= "radio" name = "tipo" value = "naranja" <?php if ($tipo == 'naranja') echo 'checked'; ?>>  Naranja 
            <input type= "radio" name = "tipo" value = "verde" <?php if ($tipo == 'verde') echo 'checked'; ?>> Verde 
            <!-- ERROR TIPO -->
            <span class = "error"><?php echo $errTipo?></span>
    </fieldset>

    <!-- CHECKBOX -->
    <fieldset class = "checkbox">
        <legend>CHECKBOX</legend>
            Quiero recibir publicidad<input type ="checkbox" value = "publicidad" name = "check[]" 
            <?php if (isset($check) && in_array("publicidad", $check)) echo 'checked'; ?>>

            Quiero recibir publicidad de verdad<input type ="checkbox" value = "publicidad2" name = "check2[]" 
            <?php if (isset($check2) && in_array("publicidad", $check2)) echo 'checked'; ?>>


            <!-- ERROR CHECK -->
            <span class = "error"><?php echo $errCheck?></span>
    </fieldset>

    <!-- SELECT -->
    <fieldset class = "select">
        <legend>SELECT</legend>
            <h2>Simple:</h2>
                <label for = "fecha">Año de finalizacion de estudios:
                <select id = "año" name = "año">
                    <option></option>
                    <option value = "2021" <?php if ($año == '2021') echo 'selected'; ?>>2021</option>
                    <option value = "2020" <?php if ($año == '2020') echo 'selected'; ?>>2020</option>
                    <option value = "2019" <?php if ($año == '2019') echo 'selected'; ?>>2019</option>
                    <option value = "2018" <?php if ($año == '2018') echo 'selected'; ?>>2018</option>
                    <option value = "2017" <?php if ($año == '2017') echo 'selected'; ?>>2017</option>
                </select>
                <!-- ERROR AÑOS -->
                <span class = "error"><?php echo $errAnio?></span>


            <h2>Multiple:</h2>
                <select id = "ciudad" name = "ciudad">
                    <option value="Madrid">Madrid</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Valencia">Zaragoza</option>
                    <option value="Valencia">Galicia</option>
                </select>
                 <!-- ERROR CIUDADES -->
                 <span class = "error"><?php echo $errCiudades?></span>
    </fieldset>

    <input type = "submit">

    
</body>
</html>