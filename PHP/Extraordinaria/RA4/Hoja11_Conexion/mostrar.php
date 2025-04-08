<?php

session_start();

    echo "El titulo es: " . $_SESSION['titulo'] . "<br>";
    echo "El texto es: " . $_SESSION['texto'] . "<br>";
    echo "La categoria es: " . implode(", ", $_SESSION['categoria']) . "<br>";
    echo '<img src="' . $_SESSION['imagen'] . '" alt="Imagen subida">';

    

?>


<!-- Botón para volver a la página anterior -->
<input type="button" value="Volver a la página anterior" onclick="history.back();">