<!-- 
 1. Recibir datos y confirmar que no son nulos
    1.1 Values
 2. Repintado
 3. Errores 
  -->
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


<form action="Hoja10.php" method="post">

    <!-- CAMPOS DE TEXTO -->
    <div class = login>
        <label>Nombre: </label><br>
        <input type="text" id="nombre" name="nombre"><br>

        <label>Contraseña :</label><br>
        <input type="text" id="contraseña" name="contraseña"><br>
    </div>
    
    <!-- RADIO -->
    <div class = color>
        <label>Rojo: </label>
        <input type="radio" id="rojo" name="rojo">

        <label>Naranja: </label>
        <input type="radio" id="naranja" name="naranja">

        <label>Verde: </label>
        <input type="radio" id="verde" name="verde">
    </div>

    <!-- CHECKBOX -->
    <div class = "publicidad">
        <label>Quiero recibir publicidad: </label>
        <input type="checkbox" id="publi" name = "publi">
    </div>

    <!-- SELECT -->
     <div class = "opciones">

        <!-- SIMPLE -->
        <h3>Simple</h3>
        <label>Año de finalizacion de estudio: </label><br>
        <select id = "año" name = "año">
            <option>2015</option>
            <option>2016</option>
            <option>2017</option>
            <option>2018</option>
        </select><br>

        <!-- MULTIPLE -->
        <h3>Multiple:</h3>
        <label>Ciudades: </label><br>
        <select id = "ciudad" name = "ciudad[]" multiple>
            <option>Gerona</option>
            <option>Madrid</option>
            <option>Zaragoza</option>
        </select>

     </div>

    
     <input type = "submit">
    
</form>

</body>
</html>