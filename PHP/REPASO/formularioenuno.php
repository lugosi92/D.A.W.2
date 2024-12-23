<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Apartado C
    if(!isset($_POST['cerveza']) || count($_POST['cerveza']) < 3 ){
        $err = true;
    }else{//Apartado e
        header("Location: principal.php");
        exit();
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con select multiple repintado</title>
</head>
<body>
<?php if(isset($err)){
echo "<p> Revise su selección</p>";
}?>

<!-- Apartado A -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    Cervezas: <br>
    <!-- Apartado b -->

    <?php $seleccionados = isset($_POST['cerveza'] ? $_POST['cerveza']  : []) ?> 
    <select multiple  name="cerveza[]">
    <option value="SanMiguel" <?php if(in_array("SanMiguel", $seleccionados) echo "selected")?>>San Miguel</option>
    <option value="Mahou">Mahou</option>
    <option value="Heineken">Heineken</option>
    <option value="Carlsberg">Carlsberg</option>
    <option value="Aguila">Aguila</option>
    </select><br>
    <input type="submit" value="Enviar" >
    </form>
</body>
</html>

