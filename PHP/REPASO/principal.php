<?php
// Apartado c2
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerveza'])) {


    echo "Has seleccionado las siguientes cervecis <br>";

    foreach($_POST['cerveza'] as $cerveza){
        echo $cerveza;
    }
}else{
    echo "No has seleccionado ninguna cerveza";
}

// Ejercicio 3
$hash = password_verify("mi_contraseña_segura", PASSWORD_DEFAULT);
?>

