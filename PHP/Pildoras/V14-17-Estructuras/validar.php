<?php
/*------------------------------------VIDEO 14-15 IF-Ternanrios---------------------------------------------------*/

if(isset($_POST["enviando"])){

    $nombre = $_POST["nombre_usuario"];
    $edad = $_POST["edad_usuario"];
  
    if($nombre == "Juan"){
      echo "<p class = \"validado\">Bienvenido </p>";
    }else{
      echo "<p class = 'no_validado'>No puedes acceder</p>";
    }

    if( $edad > 0 && $edad <= 18){
        echo "$nombre es menor de edad";
    }else if($edad > 18 && $edad <= 40){
        echo "$nombre es adulto joven";
    }else if($edad > 40 && $edad <= 65){
        echo "$nombre es adulto";
    }else if($edad > 65 && $edad <= 120){
        echo "$nombre es anciano";
    }else{
        echo "Introduzca una edad valida";
    }


/*------------------------------------VIDEO 17 SWITCH---------------------------------------------------*/
    // Switch
    $contra = $_POST["clave"];

    switch (true){
        case $nombre == "Juan" && $contra == "1234":
            echo "Usuario autorizado";
            break;
        case "Maria":
            echo "Usuario autorizado";
            break;
        case "Pedro":
            echo "Usuario autorizado";
            break;
        default:
            echo "Usuario no autorizado";

    }
}


/*------------------------------------VIDEO 17b match---------------------------------------------------*/

//Es un switch simplificado
$estado = 2;

$resultado = match($estado){
    1 => "pendiente",
    2 => "en proceso",
    3 => "completado",
    default => "desconcido",
};
?>