<!-- Crea un formulario de inicio de sesión en PHP que 
 verifique si el nombre de usuario y la contraseña coinciden con valores predefinidos.
  Si coinciden, muestra un mensaje de bienvenida; de lo contrario, muestra un mensaje de error. -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["nombre"]) && isset($_POST["clave"])){
            $nombre = $_POST["nombre"];
            $clave = $_POST["clave"];

            if($nombre == "usuario" && $clave == "1234"){
                header("Location: subida.html");
            }else{
                echo "<p>Usuario y contraseña incorrecta</p>";
            }
    }else{
        echo "Rellene el formulario";
    }
}else{
    echo "Rellene el formulario";
}